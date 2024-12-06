<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Exceptions\HttpResponseException;
use Config;

class Request extends FormRequest
{
    private const VALIDATION_ERROR = '00400';

    public function rules()
    {
        return [];
    }

    protected function failedValidation(Validator $validator)
    {
        $response = response()->json([
            'meta' => [
                'status' => $this->errorCode($validator),
                'pagination' => null
            ],
            'data' => null
        ], Response::HTTP_BAD_REQUEST);

        throw new HttpResponseException($response);
    }

    public function errorCode($validator)
    {
        return self::VALIDATION_ERROR;
    }
}