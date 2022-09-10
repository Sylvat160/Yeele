<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

  public function setAttendance(Request $request) {
    $validator = Validator::make($request->all(), [
      'event_id' => 'required|uuid',
      'participant_id' => 'required'
    ], [
      'event_id.required' => "L'identifiant de l'évènement est obligatoire.",
      'participant_id.required' => "L'identifiant du participant est obligatoire.",
      'uuid' => "L'identifiant de l'évènement est incorrect.",
      'integer' => "L'identifiant du participant est incorrect."
    ]);

    //Check if validation fails and return error messages

    if($validator->fails()) {
      $errors = ['validationErrors' => $validator->getMessageBag()];
      return response()->json($errors, 401);
    }
    $participant = Participant::where([
      ["id", "=", $request->participant_id],
      ["event_uid", "=", $request->event_id]
    ])->first();

    //Check if no participant and return error

    if(!$participant) {
      return response()->json(["error" => "Ce participant n'existe pas."], 401);
    }

    //Update the participant attendance

    $participant->update(['attendance' => true]);

    return response()->json(["success" => "La présence du participant a été validé."]);
  }
}
