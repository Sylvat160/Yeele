<?php

namespace App\Http\Controllers\AppControllers;

use App\Http\Controllers\Controller;
use App\Models\Participant;
use Illuminate\Http\Request;

class ParticipantPaymentController extends Controller
{
    public function index(string $eventId) {
        return view('app.change_payment_status', [
            "participants" => Participant::where('event_uid', $eventId)->get()
        ]);
    }
}
