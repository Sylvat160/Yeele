<?php

namespace App\Http\Controllers\AppControllers;

use DateTime;
use App\Models\User;
use App\Models\Event;
use App\Models\Command;
use App\Models\Participant;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Events\PasswordResetEvent;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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
                'email' => "Ce champ doit être une adresse email."
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
    
    /**
     * Update user firstname and lastname
     *
     * @param Request request
     *
     * @return void
     */
    public function updateFullname(Request $request) {
        $validator = Validator::make($request->all(), [
            'user_uid' => 'required',
            'firstname' => 'required',
            'lastname' => 'required'
        ], ['required' => "Ce champ est obligatoire."]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $user = User::find($request->user_uid);
        $user->update($request->only(['firstname', 'lastname']));

        return redirect()->back()->with('success', "Votre nom et votre prénom ont été mis à jour.");
    }
    
    /**
     * Update user email and phone number
     *
     * @param Request request
     *
     * @return void
     */
    public function updateEmailPhone(Request $request) {
        $validator = Validator::make($request->all(), [
            'user_uid' => 'required',
            'email' => 'required|email',
            'phone' => 'required'
        ], 
        [
            'required' => "Ce champ est obligatoire.",
            'email' => "Ce champ doit être une adresse email.",
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $user = User::find($request->user_uid);
        $user->update($request->only(['email', 'phone']));

        return redirect()->back()->with('success', "Votre adresse email et votre numéro de téléphone ont été mis à jour.");
    }
    
    /**
     * Update user organization and gender
     *
     * @param Request request
     *
     * @return void
     */
    public function updateOrgGender(Request $request) {
        $validator = Validator::make($request->all(), [
            'user_uid' => 'required',
            'organization' => 'required',
            'gender' => 'required'
        ], ['required' => "Ce champ est obligatoire."]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $user = User::find($request->user_uid);
        $user->update($request->only(['organization', 'gender']));

        return redirect()->back()->with('success', "Le nom de votre organisme et votre genre ont été mis à jour.");
    }
    
    /**
     * Update user password
     *
     * @param Request request
     *
     * @return void
     */
    public function updatePassword(Request $request) {
        $validator = Validator::make($request->all(), [
            'user_uid' => 'required',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password'
        ], 
        [
            'required' => "Ce champ est obligatoire.",
            'min' => "La longueur minimale du mot de passe est de 8 lettres.",
            'same' => "Les mots de passe doivent être les mêmes."
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $user = User::find($request->user_uid);
        $user->update(['password' => Hash::make($request->password)]);

        return redirect()->back()->with('success', "Votre mot de passe a été modifié.");
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->regenerate();
        return redirect()->route('login');
    }

    public function home() {
        $events = Event::all()->count();
        $users = User::where('role_id', '2')->get()->count();
        $participants = Participant::all()->count();
        return view('app.home' , compact('events', 'users' , 'participants'));
    }
}
