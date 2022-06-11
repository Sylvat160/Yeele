<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'name' => 'required',
            'category_id' => 'required|integer|exists:categories,id',
            'description' => 'required',
            'start_date_time' => 'required',
            'end_date_time' => 'required',
            'signup_end_date_time' =>'required',
            'country' => 'required',
            'city' => 'required',
            'location' => 'required',
            'map_html' => 'required',
            'image' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => "Ce champ est obligatoire.",
            'integer' => "Ce champ ne doit conténir que des chiffres.",
            'exists' => "Il n'existe aucune catégorie avec ce nom."
        ];
    }
}
