<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class ContributorRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_name' => 'required|max:255',
            'amount' => 'required|numeric|between:0,99999999.99',
            'collection_id' => 'required|numeric',
        ];
    }

    public function messages(): array
    {
        return [
            'user_name.required' => 'Username is required',
            'user_name.max' => 'Username max length is 255',
            'amount.required' => 'Amount is required',
            'amount.numeric' => 'Amount must be a number',
            'amount.between' => 'Amount must be from 0 to 99999999.99',
            'collection_id.required' => 'Collection not selected',
            'collection_id.number' => 'Collection not found',

        ];
    }

    public function failedValidation(Validator $validator)
    {
        if($this->wantsJson())
        {
            $response = response()->json([
                'success' => false,
                'message' => 'Ops! Some errors occurred',
                'errors' => $validator->errors()
            ]);
        }else{
            $response = response()->
            json($validator->messages(), ResponseAlias::HTTP_UNPROCESSABLE_ENTITY);
        }

        throw (new ValidationException($validator, $response))
            ->errorBag($this->errorBag)
            ->redirectTo($this->getRedirectUrl());
    }
}
