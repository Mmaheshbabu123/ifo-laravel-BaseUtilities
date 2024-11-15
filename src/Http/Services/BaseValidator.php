<?php

namespace Packages\IfoBaseUtilities\Http\Services;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

abstract class BaseValidator extends FormRequest
{
    /**
     * Handle a failed validation attempt.
     *
     * @param \Illuminate\Contracts\Validation\Validator $validator
     * @return void
     *
     * @throws \Illuminate\Http\Exceptions\HttpResponseException
     */
    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();

        // Customize the response for validation errors
        throw new HttpResponseException(
            response()->json([
                'status' => 422,
                'errors' => $errors->messages(),
            ], 422)
        );
    }
}