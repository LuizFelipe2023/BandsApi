<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class BandRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
       
        return [
            'name'        => 'required|string|max:255',
            'date_formed' => 'required|date|before:tomorrow',
            'country'     => 'required|string|max:255',
            'status'      => 'required|in:active,inactive,split-up,disbanded,unknown,other',
            
            'genre_ids'   => 'required|array|min:1',
            'genre_ids.*' => 'integer|exists:genres,id',

            'members'      => 'nullable|array',
            
            'members.*.id'   => 'required_without:members.*.name|nullable|integer|exists:members,id',
            'members.*.name' => 'required_without:members.*.id|nullable|string|max:255',
            
            'members.*.nickname' => 'nullable|string|max:255',

            'members.*.role'               => 'required|string|max:100',
            'members.*.is_original_member' => 'boolean',
            'members.*.joined_at'          => 'nullable|date',
            'members.*.left_at'            => 'nullable|date|after_or_equal:members.*.joined_at',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message' => 'Erro de validação',
            'errors'  => $validator->errors()
        ], 422));
    }
}