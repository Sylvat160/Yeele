<?php

namespace App\Http\Controllers;

use App\Models\Event;
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
        return view('forms.simple_show', compact('event'));
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
                'email' => 'required|email|unique:participants,email',
                'phone' => 'required|unique:participants,phone',
                'civility' => 'required',
            ],
            [
                'required' => "Ce champ est obligatoire.",
                'email' => "Vous devez renseigner une adresse mail.",
                'email.unique' => "Il existe déjà un participant inscrit avec ce email.",
                'phone.unique' => "Il existe déjà un participant inscrit avec ce numéro de téléphone.",
            ]
            );

            if($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }
        
            $participant = Participant::create($request->except('_token'));
            
            return redirect()->route('registering_end');
    }

    public function registering_end() {
        return view('forms.registering_end');
    }
}
