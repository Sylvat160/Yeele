<?php

namespace App\Http\Controllers\AppControllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use App\Events\PasswordResetEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Models\Command;
use Illuminate\Http\Request;

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

            if($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }
     
            $credentials = $request->all(['email', 'password']);
            $remember_me = (bool) $request->remember;

            if(!Auth::attempt($credentials, $remember_me)) {
                return redirect()->back()->with('error', "E-mail ou mot de passe incorrect!");
            }
            $request->session()->regenerate();
            return redirect()->route('app.home');

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

            if($request->selected_plan) {
                Command::create([
                    'user_uid' => $user->uid,
                    'plan_id' => (int) $request->selected_plan
                ]);
            }

        event(new Registered($user));
        Auth::login($user);
        return redirect()->route('verification.verify');
    }

    public function email_verification($hash) {
        $user = User::find($hash);
        dd($user);
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
        $status = Password::sendResetLink($request->only('email'));

        return $status === Password::RESET_LINK_SENT
                ? redirect()->route('reset_mail_sent')
                : back()->withErrors(['email' => __($status)]);
    }

    public function reset_mail_sent() {
        return view('app.auth.reset-mail-sent');
    }

    public function new_password($token) {
        if(!$token) abort(403);
        return view('app.auth.new_password', ['token' => $token]);
    }

    public function update_password(Request $request) {
        $validator = Validator::make(
            $request->all(),
            [
                'token' => 'required',
                'email' => 'required|email|exists:users,email',
                'password' => 'required|min:8',
                'confirm_password' => 'required|same:password'
            ],
            [
                'required' => "Ce champ est obligatoire.",
                'email' => "Ce champ doit conténir une adresse e-mail.",
                'same' => "Les mots de passe doivent être les mêmes.",
                'min' => "Le mot de passe entré est trop court.",
                "exists" => "Il existe aucun utilisateur avec cette adresse mail."
            ]
        );

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $status = Password::reset(
            $request->only('email', 'password', 'confirm_password', 'token'),
            function($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
     
                $user->save();
     
                event(new PasswordResetEvent($user));
            }
        );

        return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('success', __($status))
                : back()->withErrors(['token' => [__($status)]]);

    }

    public function showEditPage() {
        return view('app.edit-user-info');
    }

    public function editData(Request $request) {

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
