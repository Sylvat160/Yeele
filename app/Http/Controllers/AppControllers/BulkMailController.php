<?php

namespace App\Http\Controllers\AppControllers;

use App\Http\Controllers\Controller;
use App\Jobs\BulkmailJob;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BulkMailController extends Controller
{
    public function index($event_uid) {
        $event_menu = true;
        $event = Event::find($event_uid);
        return view('app.bulkmail', compact('event', 'event_menu'));
    }

    public function send(Request $request) {
        $participants = json_decode($request->participants, true);
        if(count($participants) === 0) {
            return redirect()->back()->with('error', "Vous n'avez sélectionné aucun participant.");
        }
        $validator = Validator::make(
            $request->all(),
            ['subject' => "required"],
            ['required' => "Ce champs est obligatoire."]
        );
        if($validator->fails()) return redirect()->back()->withErrors($validator);
        $imagesPaths = [];
        $images = array_keys($request->files->all());
        foreach ($images as $image) {
            if($file = $request->file($image)) {
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move('images/emailing_assets', $filename);
                $path = 'images/emailing_assets/' . $filename;
                $imagesPaths[$image] = $path;
            }
        }

        dispatch(new BulkmailJob(
            $participants,
            $imagesPaths,
            $request->subject,
            $request->body
        ));

        return redirect()->back()->with('success', "Les mails ont été envoyé avec succès.");
    }
}
