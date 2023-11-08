<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool   /* Quyền!!! */
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
            'name' => [
                'required',
            ],
            'author_id' => [
                function ($attribute, $value, $message) {
                    if ($value === 'default') {
                        $message('This field must not be the default option.');
                    }
                },
            ],
            'categories' => [
                function ($attribute, $value, $message) {
                    if ($value === 'default') {
                        $message('This field must not be the default option.');
                    }
                },
            ],
            'published_date' => [
                'required',
            ],
            'image' => [
                'image',
            ],
        ];
    }
    public function messages(): array
    {
        return [
            'required' => 'Please make sure to fill in this field',
        ];
    }
}
