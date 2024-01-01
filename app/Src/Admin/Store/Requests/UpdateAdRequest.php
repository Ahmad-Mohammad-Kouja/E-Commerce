<?php

namespace App\Src\Admin\Store\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdRequest extends FormRequest
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
            'title' => ['sometimes', 'string', 'max:256'],
            'description' => ['nullable', 'string'],
            'image' => ['sometimes', 'image'],
            'end_date' => ['sometimes', 'date', 'after:start_date'],
        ];
    }
}
