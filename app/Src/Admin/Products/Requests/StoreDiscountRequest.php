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
class StoreDiscountRequest extends FormRequest
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
            'item_store_id' => 'required|exists:item_stores,id',
            'start_date'    => 'required|date',
            'end_date'      => 'required|date|after:start_date',
            'type'          => 'required|in:percentage,fixed',
            'value'         => 'required|numeric',
            'status'        => 'sometimes|boolean',
        ];
    }
}
