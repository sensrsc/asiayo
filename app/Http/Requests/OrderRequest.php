<?php

namespace App\Http\Requests;

use App\Exceptions\JsonFormatter;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Arr;
use Config;
use Illuminate\Validation\ValidationException;

class OrderRequest extends Request
{
    public function rules()
    {
        return [
            'id' => 'required|string',
            'name' => 'required|string',
            'address.city' => 'required|string',
            'address.district' => 'required|string',
            'address.street' => 'required|string',
            'price' => 'required|string',
            'currency' => 'required|string|size:3|in:TWD,USD,JPY,RMB,MYR',
        ];
    }
}
