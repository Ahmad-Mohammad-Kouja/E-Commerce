<?php

namespace App\Src\Admin\Store\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreWorkRequest extends FormRequest
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
            'day' => ['required', 'string', Rule::unique('works', 'day')],
            'working' => ['sometimes', 'boolean'],
            'from' => ['required', 'time'],
            'to' => ['required', 'time', 'after:from'],
        ];
    }
}
