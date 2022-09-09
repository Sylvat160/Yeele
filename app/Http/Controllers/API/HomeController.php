<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Participant;
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

  public function setAttendance($eventId, $participantId) {
    $participant = Participant::where([
      ["id", "=", $participantId],
      ["event_uid", "=", $eventId]
    ])->first();

    if(!$participant) {
      return response()->json(["error" => "Ce participant n'existe pas."]);
    }

    $participant->update(['attendance' => true]);

    return response()->json(["success" => "La présence du participant a été validé."]);
  }
}
