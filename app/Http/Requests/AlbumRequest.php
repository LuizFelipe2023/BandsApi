<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class AlbumRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'title'        => 'required|string|max:255',
            'release_date' => 'nullable|date',
            'type'         => 'required|in:studio,live,compilation,ep,single',
            'description'  => 'nullable|string',
            'band_ids'     => 'required|array|min:1',
            'band_ids.*'   => 'exists:bands,id',
            'genre_ids'    => 'required|array|min:1',
            'genre_ids.*'  => 'exists:genres,id',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message' => 'Erro de validação',
            'errors'  => $validator->errors(),
        ], 422));
    }
}

