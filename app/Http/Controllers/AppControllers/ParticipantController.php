<?php

namespace App\Http\Controllers\AppControllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ParticipantController extends Controller
{
    public function index($event_uid) {
        $event_menu = true;
        $event = Event::find($event_uid);
        $participants = $event->participants;
        $additional_fields = [];
        if($participants->count()) {
            $additional_fields = array_keys(json_decode($participants->first()->additional_data, true));
        }
        return view('app.participant-list', compact('event', 'event_menu', 'additional_fields'));
    }

    public function editList($event_uid) {
        $event_menu = true;
        $event = Event::find($event_uid);
        $participants = $event->participants;
        $additional_fields = [];
        if($participants->count()) {
            $additional_fields = array_keys(json_decode($participants->first()->additional_data, true));
        }
        return view('app.participants-edit-list', compact('event_menu', 'event', 'participants', 'additional_fields'));
    }

    public function edit($participantId, $event_uid) {
        $participant = Participant::find($participantId);
        $event = Event::find($event_uid);
        return view('app.participant-edit', compact('participant', 'event'));
    }

    public function update(Request $request) {
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

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $data = $request->all([
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

        $filteredAdditionalData = array_filter($request->except('_token', 'participant_id', 'event_uid'), function($field) use ($data) {
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

        $data["additional_data"] = json_encode($additionalData);

        $participant = Participant::find($request->participant_id);
        $participant->update($data);

        return redirect()->route("participants-edit-list", $request->event_uid)->with("success", "Les données du participant ont été modifiées.");
    }
}