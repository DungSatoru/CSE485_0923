<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;

class BookUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'Title' => [
                'required',
            ],
            'Author' => [
                'required',
            ],
            'Genre' => [
                'required',
            ],
            'PublicationYear' => [
                'required',
                'before:now',
            ],
            'ISBN' => [
                'required',
            ],
        ];
    }
    public function messages(): array
    {
        return [
            'required' => 'Please make sure to fill in this field',
            'PublicationYear.before' => 'Please select a publication time before the present '
        ];
    }
}
