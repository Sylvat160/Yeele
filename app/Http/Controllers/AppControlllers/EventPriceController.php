<?php

namespace App\Http\Controllers\AppControlllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param string $event_uid
     *
     * @return \Illuminate\Http\Response
     */
    public function index($event_uid)
    {
        $event_menu = true;
        $event = Event::find($event_uid);
        return view('app.event-price-index', compact('event_menu', 'event'));
    }

    /**
     * Show the form for creating a new resource.
     * @param string $event_uid
     *
     * @return \Illuminate\Http\Response
     */
    public function create($event_uid)
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $uid
     * @param string $event_uid
     * @return \Illuminate\Http\Response
     */
    public function show($uid, $event_uid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string $uid
     * @param string $event_uid
     * @return \Illuminate\Http\Response
     */
    public function edit($uid, $event_uid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string $uid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uid)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $uid
     * @return \Illuminate\Http\Response
     */
    public function destroy($uid)
    {
        //
    }
}
