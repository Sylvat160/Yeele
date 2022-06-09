<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstname' => 'string|required',
            'lastname' => 'string|required',
            'email' => 'email|unique:users,email|required',
            'confirm_email' => 'email|same:email|required',
            'phone' => 'integer|unique:users,phone',
            'organization' => 'required',
            'gender' => 'string|required',
            'password' => 'min:8|required',
            'confirm_password' => 'same:password|required',
        ];
    }

    public function messages()
    {
        return [
            'string' => "Ce champ doit contenir une chaine de caractères.",
            'required' => "Ce champ est obligatoire.",
            'email' => "Adresse e-mail invalide.",
            'email.unique' => "Il existe déjà un utilisateur avec ce e-mail.",
            'phone.unique' => "Il existe déjà un utilisateur avec ce numéro de téléphone.",
            'confirm_email.same' => "Veuillez entrez le même e-mail que le champ précédent.",
            'integer' => "Ce champ doit contenir que des chiffres.",
            'min' => "Le mot de passe doit être long d'au moins 8 caractères.",
            'confirm_password.same' => "Les mots de passe doivent être les mêmes."
        ];
    }
}
