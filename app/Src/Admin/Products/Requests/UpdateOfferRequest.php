<?php

namespace App\Src\Admin\Products\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed $name
 * @property mixed $id
 * @property mixed $description
 * @property mixed $weight
 * @property mixed $quantity
 * @property mixed $status
 */
class UpdateOfferRequest extends FormRequest
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
            'store_id' => ['sometimes', 'exists:stores,id'],
            'title' => ['sometimes', 'string'],
            'description' => ['nullable', 'string'],
            'start_date' => ['sometimes', 'date'],
            'end_date' => ['sometimes', 'date', 'after:start_date'],
            'price' => ['sometimes', 'numeric'],
            'status' => ['sometimes', 'boolean'],
        ];
    }
}
