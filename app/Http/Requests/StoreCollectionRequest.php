<?php

namespace App\Http\Requests;


use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use InvalidArgumentException;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class StoreCollectionRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'title' => 'required|max:255',
            'description' => '',
            'target_amount' => 'required|numeric|between:0,99999999.99',
            'link' => 'required|url'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Title is required',
            'title.max' => 'Title max length is 255',
            'target_amount.required' => 'Target amount is required',
            'target_amount.numeric' => 'Target amount must be a number',
            'target_amount.between' => 'Target amount must be from 0 to 99999999.99',
            'link.required' => 'Link is required',
            'link.url' => 'Not url entered',

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
