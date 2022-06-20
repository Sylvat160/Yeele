<?php

namespace App\Http\Controllers\AppControllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

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
}
