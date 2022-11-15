<?php

namespace App\Http\Controllers\AppControllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ParticipantController extends Controller
{
    public function index($event_uid)
    {
        $event_menu = true;
        $event = Event::find($event_uid);
        $participants = $event->participants;
        $additional_fields = json_decode($event->form_fields_names, true) ?? [];

        return view(
            'app.participant-list',
            compact('event', 'event_menu', 'additional_fields')
        );
    }

    public function editList($event_uid)
    {
        $event_menu = true;
        $event = Event::find($event_uid);
        $participants = $event->participants;
        // $participants = array_filter($event->participants->toArray(), function ($participant) {
        //     if ($participant["payment_status"] === 0) {
        //         return $participant;
        //     }
        // });
        $additional_fields = json_decode($event->form_fields_names, true) ?? [];

        return view(
            'app.participants-edit-list',
            compact('event_menu', 'event', 'participants', 'additional_fields')
        );
    }
    public function paymentEditList($event_uid)
    {
        $event_menu = true;
        $event = Event::find($event_uid);
        $participants = $event->participants;
        $additional_fields = json_decode($event->form_fields_names, true) ?? [];

        return view(
            'app.participant_payment_edit_list',
            compact('event_menu', 'event', 'participants', 'additional_fields')
        );
    }

    public function edit($participantId, $event_uid)
    {
        $participant = Participant::find($participantId);
        $event = Event::find($event_uid);
        $fields = $event->form_fields_names
            ? json_decode($event->form_fields_names, true)
            : [];
        return view(
            'app.participant-edit',
            compact('participant', 'event', 'fields')
        );
    }
    public function participantEditPayment($participantId, $event_uid)
    {
        $participant = Participant::find($participantId);
        $event = Event::find($event_uid);
        $fields = $event->form_fields_names
            ? json_decode($event->form_fields_names, true)
            : [];
        return view(
            'app.participant_payment_edit',
            compact('participant', 'event', 'fields')
        );
    }

    public function update(Request $request)
    {
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
                'required' => 'Ce champ est obligatoire.',
                'email' => 'Vous devez renseigner une adresse mail.',
                'email.unique' =>
                    'Il existe déjà un participant avec cette adresse email.',
                'phone.unique' =>
                    'Il existe déjà un participant avec cet numéro de téléphone.',
            ]
        );

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator);
        }

        $data = $request->all([
            'lastname',
            'firstname',
            'email',
            'phone',
            'civility',
            'price',
            'payment_method',
            'field_uid',
        ]);

        /*
         * Filter dynamics fields data from the request
         */

        $dataKeys = array_keys($data);
        $allRequestDataKeys = array_keys(
            $request->except('_token', 'event_uid', 'participant_id')
        );

        $filteredAdditionalDataKey = array_filter(
            $allRequestDataKeys,
            function ($key) use ($dataKeys) {
                if (!in_array($key, $dataKeys)) {
                    return $key;
                }
            }
        );

        $filteredAdditionalData = [];

        foreach ($filteredAdditionalDataKey as $key) {
            if (stristr($request->input($key), '[')) {
                $filteredAdditionalData[$key] = json_decode(
                    $request->input($key),
                    true
                );
            } else {
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
            if ($file = $request->file($key)) {
                $filename = time();
                $extension = $file->getClientOriginalExtension();
                $fullname = "$filename.$extension";
                $pathname = $file
                    ->move('participants_files', $fullname)
                    ->getPathname();
                $fileData = file_get_contents($pathname);
                $fileType = 'image/';
                if (!in_array($extension, ['png', 'jpeg', 'jpg', 'svg'])) {
                    $fileType = 'application/';
                }
                $base64 =
                    'data:' .
                    $fileType .
                    $extension .
                    ';base64,' .
                    base64_encode($fileData);
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
        $additionalData = array_merge(
            $additionalOtherInputs,
            $additionalFileInputs
        );
        $data['additional_data'] = json_encode($additionalData);

        $participant = Participant::find($request->participant_id);
        $participant->update($data);

        return redirect()
            ->route('participants-edit-list', $request->event_uid)
            ->with('success', 'Les données du participant ont été modifiées.');
    }


    public function participantUpdatePage($participant_id, $event_uid)
    {
        $participant = Participant::find($participant_id);
        $event = Event::find($event_uid);
        $fields = json_decode($event->form->data, true);
        return view(
            'forms.participant-update',
            compact('participant', 'event', 'fields')
        );
    }

    //Participant updates

    public function paymentUpdate(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'references' => 'required',
                
            ],
            [
                'required' => 'Ce champ est obligatoire.',
                
            ]
        );

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator);
        }

        $participant = Participant::find($request->participant_id);
        $participant->update([
            'payment_reference' => $request->references,
            'payment_status ' => true,
        ]);

        return redirect()
            ->route('participants-payment-edit-list', $request->event_uid)
            ->with(
                'success',
                'Le paiement de ce participant a bien été pris en compte.'
            );
    }
    public function participantUpdate(Request $request)
    {
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
                'required' => 'Ce champ est obligatoire.',
                'email' => 'Vous devez renseigner une adresse mail.',
                'email.unique' =>
                    'Il existe déjà un participant avec cette adresse email.',
                'phone.unique' =>
                    'Il existe déjà un participant avec cet numéro de téléphone.',
            ]
        );

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator);
        }

        $data = $request->all([
            'lastname',
            'firstname',
            'email',
            'phone',
            'civility',
            'price',
            'payment_method',
            'field_uid',
        ]);

        /*
         * Filter dynamics fields data from the request
         */

        $dataKeys = array_keys($data);
        $allRequestDataKeys = array_keys(
            $request->except('_token', 'event_uid', 'participant_id')
        );

        $filteredAdditionalDataKey = array_filter(
            $allRequestDataKeys,
            function ($key) use ($dataKeys, $request) {
                if (!in_array($key, $dataKeys)) {
                    return $key;
                }
            }
        );

        $filteredAdditionalData = [];

        foreach ($filteredAdditionalDataKey as $key) {
            if (stristr($request->input($key), '[')) {
                $filteredAdditionalData[$key] = json_decode(
                    $request->input($key),
                    true
                );
            } else {
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
            if ($file = $request->file($key)) {
                $filename = time();
                $extension = $file->getClientOriginalExtension();
                $fullname = "$filename.$extension";
                $pathname = $file
                    ->move('participants_files', $fullname)
                    ->getPathname();
                $fileData = file_get_contents($pathname);
                $fileType = 'image/';
                if (!in_array($extension, ['png', 'jpeg', 'jpg', 'svg'])) {
                    $fileType = 'application/';
                }
                $base64 =
                    'data:' .
                    $fileType .
                    $extension .
                    ';base64,' .
                    base64_encode($fileData);
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
        $additionalData = array_merge(
            $additionalOtherInputs,
            $additionalFileInputs
        );
        $data['additional_data'] = json_encode($additionalData);

        $participant = Participant::find($request->participant_id);
        $participant->update($data);

        return redirect()->route(
            'participant-data-updated',
            $request->event_uid
        );
    }

    public function participantDataUpdated($event_uid)
    {
        $event = Event::find($event_uid);
        return view('app.participant-data-updated', [
            'eventName' => $event->name,
        ]);
    }

    public function destroy(Request $request)
    {
        Participant::destroy($request->participant_id);
        return redirect()
            ->back()
            ->with('success', 'Le participant a été supprimé avec succès!');
    }

    public function checkLinkCount($eventId, $participantEmail)
    {
        $participant = Participant::where([
            ['email', '=', $participantEmail],
            ['event_uid', '=', $eventId],
        ])->first();

        if (!$participant) {
            return redirect()
                ->route('participant_link_checking')
                ->with(
                    'error',
                    "Il n'existe pas de participant avec ces identifiants."
                );
        }

        $linkCount = (int) $participant->link_count;

        if ($linkCount >= 3) {
            return redirect()
                ->route('participant_link_checking')
                ->with('error', 'Le lien de participant est expiré!');
        }

        $linkCount++;

        $participant->update(['link_count' => $linkCount]);

        // return redirect to zoom meeting
    }
}
