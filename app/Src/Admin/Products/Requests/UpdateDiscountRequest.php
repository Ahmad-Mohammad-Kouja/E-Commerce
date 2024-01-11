<?php

namespace App\Src\Admin\Products\Requests;

use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Foundation\Http\FormRequest;
use App\Domains\Products\Enums\ItemStatusEnum;
use App\Domains\Products\Enums\DiscountTypeEnum;

/**
 * @property mixed $name
 * @property mixed $id
 * @property mixed $description
 * @property mixed $weight
 * @property mixed $quantity
 * @property mixed $status
 */
class UpdateDiscountRequest extends FormRequest
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
            'item_store_id' => ['sometimes', 'exists:item_stores,id'],
            'start_date'    => ['required_with:end_date', 'date'],
            'end_date'      => ['sometimes', 'date', 'after:start_date'],
            'type'          => ['sometimes', new EnumValue(DiscountTypeEnum::class, false)],
            'value'         => ['sometimes', 'numeric'],
            'status'        => ['sometimes', 'boolean'],
        ];
    }
}
