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
        return view('forms.simple_form', compact('event'));
    }

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
            ]
            );

            $participantWithEmailExist = Participant::where('event_uid', $request)
                                        ->where('email', $request->email)
                                        ->first();
            $participantWithPhoneExist = Participant::where('event_uid', $request)
                                        ->where('phone', $request->phone)
                                        ->first();

            if($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            } else if($participantWithEmailExist) {
                return redirect()->back()->with('error', "il existe dejà un participant inscrit l'email entré.");
            } else if($participantWithPhoneExist) {
                return redirect()->back()->with('error', "il existe dejà un participant inscrit le numéro de téléphone entré.");
            }
        
            $participant = Participant::create($request->except('_token'));
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
}
