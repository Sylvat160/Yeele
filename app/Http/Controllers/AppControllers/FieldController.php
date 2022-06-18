<?php

namespace App\Http\Controllers\AppControllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Field;
use App\Models\FieldDefaultValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FieldController extends Controller
{
    /**
     * @param string $event_uid;
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($event_uid)
    {
        $event_menu = true;
        $event = Event::find($event_uid);
        return view('app.fields-index', compact('event_menu', 'event'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'value' => 'required'
            ],
            ['required' => "Ce champ est obligatoire."]
        );

        if($validator->fails()) {
            return redirect()->back()->with('error', true)->withErrors($validator);
        }

        Field::create($request->except('_token'));

        return redirect()->back()->with('success', "Une valeur du champ libre a été ajoutée.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $uid
     * @return \Illuminate\Http\Response
     */
    public function destroy($uid)
    {
        Field::destroy($uid);
        return redirect()->back()->with('success', "Une valeur du champ libre a été supprimée.");
    }
}
