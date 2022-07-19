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
        if($newStatus) $event->update(['multiple_prices_active' => $newStatus]);
        else {
            $event->update([
                'multiple_prices_active' => false,
                'prices_quantity_active' => false
            ]);
        }

        return response()->json(['status' => $newStatus]);
    }

    public function updateQuantityStatus(Request $request) {
        $event = Event::find($request->event_uid);
        $qStatus = (bool) $event->prices_quantity_active;
        $newStatus = !$qStatus;
        $event->update(['prices_quantity_active' => $newStatus]);

        return response()->json(['status' => $newStatus]);
    }
}
