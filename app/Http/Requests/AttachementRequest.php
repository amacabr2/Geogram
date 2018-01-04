<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;

class AttachementRequest extends JsonRequest {

    /**
     * @return bool
     */
    public function expectsJson() {
        return true;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'attachable_id' => 'required|int',
            'image' => 'required|image|mimes:jpeg,png,jpg',
            'attachable_type' => 'required'
        ];
    }

    public function messages() {
        return [
            'attachable_id.required' => 'Ce contenu ne peut pas recevoir de fichiers attachés',
            'attachable_id.int' => 'Ce contenu ne peut pas recevoir de fichiers attachés',
            'image.required' => 'Ce contenu ne peut pas recevoir de fichiers attachés',
            'image.image' => 'Le fichier attaché doit être une image (jpeg, png, jpg)',
            'image.mimes' => 'Le fichier attaché doit être une image (jpeg, png, jpg)',
            'attachable_type.required' => 'Ce contenu ne peut pas recevoir de fichiers attachés',
        ];
    }

    protected function failedValidation(Validator $validator) {
        //TODO: ne pas retirer
    }
}
