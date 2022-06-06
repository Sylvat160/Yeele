<?php

namespace App\Http\Controllers\AppControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request) {
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'email|required',
                'password' => 'required'
            ],
            [
                'required' => "Ce champ est obligatoire.",
                'email' => "Ce champ doit être un adresse email"
            ]
            );

            if($validator->failed()) {
                return redirect()->back()->withErrors($validator);
            }
     
    }

    public function register(RegisterRequest $request) {
        $data = array_merge(
            array_slice($request->validated(), 0, -2),
            [
                'role_id' => 2,
                'password' => Hash::make($request->password)
            ]
            );

        $user = User::create($data);

        event(new Registered($user));
    }

    public function email_verification(EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect()->route('app.home');
    }

    public function home() {
        return view('app.home');
    }
}
