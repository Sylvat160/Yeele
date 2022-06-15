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
                'label' => 'required',
                'type' => 'required'
            ],
            ['required' => "Ce champ est obligatoire."]
        );

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $field = Field::create($request->except('_token', 'value'));

        if(stristr($request->value, '[')) {
            $values = json_decode($request->value, true);
            foreach ($values as $value) {
                FieldDefaultValue::create([
                    'field_uid' => $field->uid,
                    'value' => $value
                ]);
            }
        } else if($request->value != null) {
            FieldDefaultValue::create([
                'field_uid' => $field->uid,
                    'value' => $request->value
            ]);
        }

        return redirect()->back()->with('success', "Un champ libre a été ajouté.");
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
        return redirect()->back()->with('success', "Un champ libre a été supprimé.");
    }
}
