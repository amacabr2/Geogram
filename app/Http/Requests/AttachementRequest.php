<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttachementRequest extends FormRequest
{

    public function expectsJson() {
        return true;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'attachable_id' => 'required|int',
            'image' => 'reqired|image',
            'attachable_type' => 'required'
        ];
    }
}
