<?php

namespace App\Http\Controllers;

use App\Jobs\ParticipantRegisteringMailJob;
use App\Models\ElectronicSignature;
use App\Models\Event;
use App\Models\Form;
use App\Models\Participant;
use App\Models\ParticipantPrices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FormController extends Controller
{
    /**
     * Show the event
     *
     * @param string $event_uid
     *
     * @return \Illuminate\Contracts\View\View
     */

    public function index($event_uid) {
        $event = Event::find($event_uid);
        if (!isset($event)) {
            return view('app.event_not_found');
        }
        $event->update(['clicks' => (int) $event->clicks + 1]);
        return view('forms.show_event', compact('event'));
    }

    /**
     * Show the participant registering form
     *
     * @param string event_uid
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create($event_uid) {
        $event = Event::find($event_uid);
        if (!isset($event)) {
            return view('app.event_not_found');
        }
        $fields = $event->form ? json_decode($event->form->data, true) : [];
        return view('forms.registration_form', compact('event', 'fields'));
    }

    /**
     * Register a participant
     *
     * @param Request request
     *
     * @return void
     */
    public function register(Request $request) {
        $validator = Validator::make(
            $request->all(),
            [
                'event_uid' => 'required',
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'civility' => 'required',
            ],
            [
                'required' => "Ce champ est obligatoire.",
                'email' => "Vous devez renseigner une adresse mail.",
                'email.unique' => "Il existe déjà un participant avec cette adresse email.",
                'phone.unique' => "Il existe déjà un participant avec cet numéro de téléphone."
            ]
            );

            $participantWithEmailExist = Participant::where('event_uid', $request->event_uid)
                                        ->where('email', $request->email)
                                        ->first();
            $participantWithPhoneExist = Participant::where('event_uid', $request->event_uid)
                                        ->where('phone', $request->phone)
                                        ->first();

            if($participantWithEmailExist) {
                return redirect()->back()->with('error', "il existe dejà un participant inscrit l'email entré.");
            } else if($participantWithPhoneExist) {
                return redirect()->back()->with('error', "il existe dejà un participant inscrit le numéro de téléphone entré.");
            }

            $event = Event::find($request->event_uid);
            $currentCommand = $event->user->custom['currentCommand'];

            if($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            } else if(isset($currentCommand)) {
                $planISilver = $currentCommand->plan_id === 1;
                if($planISilver && $event->participants->count() >= 20) {
                    return
                    redirect()
                    ->back()
                    ->with('error', "Le nombre total d'inscriptions (soit 20) est atteint. Veuillez contacter le gestionnaire de l'évènement.");
                }
            } else if($event->participants->count() >= 4) {
                return
                redirect()
                ->back()
                ->with('error', "Le nombre total d'inscriptions est atteint. Veuillez contacter le gestionnaire de l'évènement.");
            }

            $data = $request->all([
                'event_uid',
                'lastname',
                'firstname',
                'email',
                'phone',
                'civility',
                'price',
                'payment_method',
                'field_uid',
            ]);

            $data['payment_status'] = $request->payment_status ?? false;

            /*
            * Filter dynamics fields data from the request
            */

            $dataKeys = array_keys($data);
            $allRequestDataKeys = array_keys($request->except('_token', 'prices'));

            $filteredAdditionalDataKey = array_filter($allRequestDataKeys, function($key) use ($dataKeys, $request) {
                if(!in_array($key, $dataKeys)) return $key;
            });

            $filteredAdditionalData = [];

            foreach ($filteredAdditionalDataKey as $key) {
                if(stristr($request->input($key), '[')) {
                    $filteredAdditionalData[$key] = json_decode($request->input($key), true);
                }
                else {
                    $filteredAdditionalData[$key] = $request->input($key);
                }
            }

            /*
            * Init the process of separating different kind of data
            * Loop over filtered data
            * And get base64 from file inputs data
            * Fill created arrays
            */

            $additionalFileInputs = [];
            $additionalOtherInputs = [];

            foreach ($filteredAdditionalData as $key => $value) {
                if($file = $request->file($key)) {
                 $filename = time();
                 $extension = $file->getClientOriginalExtension();
                 $fullname = "$filename.$extension";
                 $pathname = $file->move('participants_files', $fullname)->getPathname();
                 $fileData = file_get_contents($pathname);
                 $fileType = "image/";
                 if(!in_array($extension, ['png', 'jpeg', 'jpg', 'svg'])) {
                   $fileType = "application/";
                 }
                 $base64 = 'data:' . $fileType . $extension . ';base64,' . base64_encode($fileData);
                 $additionalFileInputs[$key] = $base64;
                } else {
                  $additionalOtherInputs[$key] = $value ?? '';
                }
              }

            /*
            * Merge all the dynamics fields processed data
            * Get its JSON format processed data
            * And create participant
            */
            $additionalData = array_merge($additionalOtherInputs, $additionalFileInputs);
            $data['additional_data'] = json_encode($additionalData);

            $participant = Participant::create($data);
            $event = Event::find($participant->event_uid);
            if((bool) $event->multiple_prices_active) {
                $prices = json_decode($request->prices, true);
                if((bool) $event->prices_quantity_active) {
                    foreach ($prices as $price) {
                        foreach ($price as $price_uid => $quantity) {
                            ParticipantPrices::create([
                                'participant_id' => $participant->id,
                                'event_price_uid' => $price_uid,
                                'quantity' => $quantity
                            ]);
                        }
                    }
                } else {
                    foreach ($prices as $price_uid) {
                        ParticipantPrices::create([
                            'participant_id' => $participant->id,
                            'event_price_uid' => $price_uid
                        ]);
                    }
                }
            }

            dispatch(new ParticipantRegisteringMailJob($participant));
            return redirect()->route('registering_end')->with('event', $event->name);
    }

    /**
     * Page to whice participant is redirected after registering.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function registering_end() {
        return view('forms.registering_end');
    }

    /**
     * Show the dynamic creating form.
     *
     * @param string event_uid
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function formbuilder_editor($event_uid) {
        $event_menu = true;
        $event = Event::find($event_uid);
        if($event->form) {
            return redirect()->back()->with('warning', "Il existe déjà un formulaire lié à cet évènement.");
        }
        return view('forms.formbuilder', compact('event', 'event_menu'));
    }

    /**
     * Create dynamic field.
     *
     * @param Request request
     *
     * @return void
     */
    public function build_form(Request $request) {
        $form = Form::create($request->all(['event_uid', 'data']));
        $form->event->update(['form_fields_names' => $request->fields_names_list]);
        return json_encode(['event_uid' => $request->event_uid]);
    }

    /**
     * Show the dynamic fields edit form.
     *
     * @param string event_uid
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function edit_form($event_uid) {
        $event_menu = true;
        $event = Event::find($event_uid);
        $form = $event->form;
        if(!isset($event->form)) return redirect()->back()->with('warning', "Vous n'avez aucun champ additionnel au formulaire créé.");
        return view('forms.formbuilder-edit', compact('form', 'event_menu', 'event'));
    }

    /**
     * Update the dynamic fields.
     *
     * @param Request request
     *
     * @return void
     */
    public function update_form(Request $request) {
        $form = Form::find($request->form_uid);
        $form->update($request->all(['data']));
        $form->event->update(['form_fields_names' => $request->fields_names_list]);

        return json_encode(["event_uid" => $form->event_uid]);
    }

    public function electronic_signature_desc() {
        return view('forms.electronic_signature_post');
    }

    public function electronic_signature_index() {
        return view('forms.electronic_signature_form');
    }

    public function electronic_signature_submit(Request $request) {
        $data = $request->except('_token');
        $dataToJSON = json_encode($data);
        ElectronicSignature::create(['data' => $dataToJSON]);

        return redirect()->route('signature_form_sent');
    }

    public function electronic_signature_done() {
        return view('forms.electronic_signature_done');
    }

    public function electronic_signature_data() {
        $allData = ElectronicSignature::all();
        $electronicSignatures = [];
        $keys = [
            "knownledge_about",
            "usage",
            "have_you_ever_signed",
            "we_signed_with",
            "type_of_partners",
            "interest",
            "intro_date",
            "signature_value",
            "having_signature",
            "usage_type",
            "question_14",
            "usage_reason",
            "documents_size",
            "remote_and_covid_impact",
            "obstacles",
            "recipient_call",
            "signature_is_interface_with_ged",
            "alternatives",
            "workers_number",
            "activity_field",
            "work_service",
            "exact_function"
        ];

        $tbKeys = [
            "simple_signature_exemple",
            "advanced_signature_exemple",
            "certificated_signature_exemple",
            "qualified_signature_exemple",
        ];
        foreach ($allData as $es) {
            array_push($electronicSignatures, json_decode($es->data, true));
        }

        return view('app.electronic_signature_data', compact('electronicSignatures', 'keys', 'tbKeys'));
    }
}
