<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class FormController extends Controller
{
    /**
     * @param string $event_uid
     * @return \Illuminate\Contracts\View\View
     */

    public function index($event_uid) {
        $event = Event::find($event_uid);
        return view('forms.simple', compact('event'));
    }
}
