<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function events() {
    $events = auth()->user()->events;
    return response()->json($events);
  }

  public function eventParticipants($eventId) {
    $event = Event::find($eventId);
    $participants = $event->participants;

    return response()->json($participants);
  }
}
