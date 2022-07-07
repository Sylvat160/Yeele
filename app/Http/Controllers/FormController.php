<?php

namespace App\Http\Controllers;

use App\Jobs\ParticipantRegisteringMailJob;
use App\Models\Event;
use App\Models\Form;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FormController extends Controller
{
    /**
     * @param string $event_uid
     * @return \Illuminate\Contracts\View\View
     */

    public function index($event_uid) {
        $event = Event::find($event_uid);
        $event->update(['clicks' => (int) $event->clicks + 1]);
        return view('forms.show_event', compact('event'));
    }

    public function create($event_uid) {
        $event = Event::find($event_uid);
        return view('forms.registration_form', compact('event'));
    }

    public function register(Request $request) {
        $validator = Validator::make(
            $request->all(),
            [
                'event_uid' => 'required',
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => 'required|unique:participants,email',
                'phone' => 'required|unique:participants,phone',
                'civility' => 'required',
            ],
            [
                'required' => "Ce champ est obligatoire.",
                'email' => "Vous devez renseigner une adresse mail.",
                'email.unique' => "Il existe déjà un participant avec cette adresse email.",
                'phone.unique' => "Il existe déjà un participant avec cet numéro de téléphone."
            ]
            );

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
                'field_uid']);

            /*
            * Filter dynamics fields data from the request
            */

            $filteredAdditionalData = array_filter($request->except('_token'), function($field) use ($data) {
                if(!in_array($field, $data)) return $field;
            });

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
                 $data = file_get_contents($pathname);
                 $fileType = "image/";
                 if(!in_array($extension, ['png', 'jpeg', 'jpg', 'svg'])) {
                   $fileType = "application/";
                 }
                 $base64 = 'data:' . $fileType . $extension . ';base64,' . base64_encode($data);
                 $additionalFileInputs[$key] = $base64;
                } else {
                  $additionalOtherInputs[$key] = $value;
                }
              }

            /*
            * Merge all the dynamics fields processed data
            * Get its JSON format processed data
            * And create participant
            */

            $additionalData = array_merge($additionalFileInputs, $additionalOtherInputs);

            $data['additional_data'] = json_encode($additionalData);
            
            $participant = Participant::create($data);
            $event = Event::find($participant->event_uid);
            dispatch(new ParticipantRegisteringMailJob($participant));
            return redirect()->route('registering_end')->with('event', $event->name);
    }

    public function registering_end() {
        return view('forms.registering_end');
    }

    public function formbuilder_editor($event_uid) {
        $event_menu = true;
        $event = Event::find($event_uid);
        if($event->form) {
            return redirect()->back()->with('warning', "Il existe déjà un formulaire lié à cet évènement.");
        }
        return view('forms.formbuilder', compact('event', 'event_menu'));
    }

    public function build_form(Request $request) {
        Form::create($request->all());

        return json_encode(['event_uid' => $request->event_uid]);
    }

    public function edit_form($event_uid) {
        $event = Event::find($event_uid);
        if(!isset($event->form)) return redirect()->back()->with('error', "Vous n'avez aucun champ additionnel au formulaire créé.");
        return view('forms.formbuilder-edit', ['form' => $event->form]);
    }

    public function update_form(Request $request) {
        $form = Form::find($request->form_uid);
        $form->update($request->all());

        return json_encode(["event_uid" => $form->event_uid]);
    }
}
