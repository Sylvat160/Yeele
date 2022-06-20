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
        return view('app.participant-list', compact('event', 'event_menu'));
    }
}
