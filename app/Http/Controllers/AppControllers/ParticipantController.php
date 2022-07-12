<?php

namespace App\Http\Controllers\AppControllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Participant;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    public function index($event_uid) {
        $event_menu = true;
        $event = Event::find($event_uid);
        $participants = $event->participants;
        $additional_fields = [];
        if($participants->count()) {
            $additional_fields = array_keys(json_decode($participants->last()->additional_data, true));
        }
        return view('app.participant-list', compact('event', 'event_menu', 'additional_fields'));
    }

    public function edit($participantId, $event_uid) {
        $participant = Participant::find($participantId);
        $event = Event::find($event_uid);
        return view('app.participant-edit', compact('participant', 'event'));
    }

    public function update($participantId, $event_uid) {
        $event_menu = true;
        $event = Event::find($event_uid);
        $participant = Participant::find($participantId);

        return view('app.participant-edit', compact('event_menu', 'event', 'participant'));
    }
}
