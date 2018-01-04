<?php
/**
 * Created by PhpStorm.
 * User: antho
 * Date: 03/01/2018
 * Time: 11:58
 */

namespace App\Http\Requests;


use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\JsonResponse;

abstract class JsonRequest extends FormRequest {

    protected $errorMessage = [];

    /**
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator) {
       throw new HttpResponseException(response()->json($validator->errors(), JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
    }
}