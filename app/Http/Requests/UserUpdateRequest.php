<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserUpdateRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'pseudo' => 'required',
            'lastName' => 'required',
            'firstName' => 'required',
            'email' => 'required|email',
            'state' => 'required',
            'codePostal' => 'required|integer',
            'adresse' => 'required',
            'birthDate' => 'required|date',
            'description' => 'required',
            'avatar' => 'image|sometimes:nullable',
            'couverture' => 'image|sometimes:nullable',
            'job' => 'required',
            'lienFacebook' => 'required',
            'lienInstagram' => 'required',
            'lienTwitter' => 'required',
            'lienGoogle' => 'required',
        ];
    }

    /**
     * Message d'erreur
     *
     * @return array
     */
    public function messages() {
        return [
            'pseudo.required' => 'Le champ :attribute est requis',
            'lastName.required' => 'Le champ :attribute est requis',
            'firstName.required' => 'Le champ :attribute est requis',
            'email.required' => 'Le champ :attribute est requis',
            'email.email' => 'Le champ :attribute doit être une adresse mail',
            'state.required' => 'Le champ :attribute est requis',
            'codePostal.required' => 'Le champ :attribute est requis',
            'codePostal.integer' => 'Le champ :attribute doit être un nombre',
            'adresse.required' => 'Le champ :attribute est requis',
            'birthDate.required' => 'Le champ :attribute est requis',
            'birthDate.date' => 'Le champ :attribute doit être une date',
            'description.required' => 'Le champ :attribute est requis',
            'avatar.image' => 'Le champ :attribute peut avoir comme extension .png, .jpg, .jpeg',
            'couverture.image' => 'Le champ :attribute peut avoir comme extension .png, .jpg, .jpeg',
            'job' => 'Le champ :attribute est requis',
            'lienFacebook.required' => 'Le champ :attribute est requis',
            'lienInstagram.required' => 'Le champ :attribute est requis',
            'lienTwitter.required' => 'Le champ :attribute est requis',
            'lienGoogle.required' => 'Le champ :attribute est requis',
        ];
    }
}
