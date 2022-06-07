<?php

namespace App\Http\Controllers\AppControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\Command;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
                'email' => "Ce champ doit être un adresse email."
            ]
            );

            if($validator->failed()) {
                return redirect()->back()->withErrors($validator);
            }
     
            $credentials = $request->all(['email', 'password']);
            $remember_me = (bool) $request->remember;

            if(Auth::attempt($credentials, $remember_me)) {
                $request->session()->regenerate();
                return redirect()->route('app.home');
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

        Command::create([
            'user_uid' => $user->uid,
            'plan_id' => (int) $request->selected_plan
        ]);

        event(new Registered($user));
        Auth::login($user);
        return redirect()->route('verification.verify');
    }

    public function email_verification(EmailVerificationRequest $request) {
        $request->fulfill();

        return redirect()->route('app.home');
    }

    public function resend_verification_mail(Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return redirect()->route('resent_mail');
    }

    public function resent_mail() {
        return view('app.auth.verification_email_resent');
    }

    public function reset_request(Request $request) {
        $validator = Validator::make(
            $request->email,
            ['email' => 'required|email|exists:users,email'],
            [
                'required' => "Ce champ ne doit pas être vide.",
                'email' => "Ce champ doit conténir une adresse e-mail.",
                'exists' => "Il n'existe aucun utilisateur avec ce e-mail."
            ]
            );

        if($validator->failed()) {
            return redirect()->back()->withErrors($validator);
        }

    }

    public function reset_mail_sent() {
        return view('app.auth.reset-mail-sent');
    }

    public function new_password() {
        
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->regenerate();
        return redirect()->route('login');
    }

    public function home() {
        return view('app.home');
    }
}
