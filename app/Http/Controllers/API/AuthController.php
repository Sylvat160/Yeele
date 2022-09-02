<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function authenticate(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
            'token' => 'required'
        ], [
            'email.required' => "Vous devez fournir une adresse email.",
            'password.required' => "Vous devez fournir un mot de passe.",
            'token.required' => "Accès réfusé.",
            'email' => "Votre adresse email est incorrect."
        ]);

        if($validator->fails()) {
            $errors = ['validationErrors' => $validator->getMessageBag()];
            return response()->json($errors, 401);
        } else if($request->token !== "YEELE_ACCESS_CHECKING_APP") {
            $error = [
                'validationErrors' => ['token' => ["Accès réfusé."]]
            ];
            return response()->json($error, 401);
        }

        if(!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['error' => "Adresse email ou mot de passe incorrect."], 401);
        }

        $token = $request->user()->createToken('YEELE_ACCESS_TOKEN');

        return response()->json(['token' => $token->plainTextToken]);
    }
}
