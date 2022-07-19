<?php

namespace App\Http\Controllers\AppControllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class PriceSettingController extends Controller
{
    public function updateMultiSelectStatus(Request $request) {
        $event = Event::find($request->event_uid);
        $msStatus = (bool) $event->multiple_prices_active;
        $newStatus = !$msStatus;
        $event->update(['multiple_prices_active' => $newStatus]);
        return response()->json(['status' => $newStatus]);
    }

    public function updateQuantityStatus(Request $request) {

    }
}
