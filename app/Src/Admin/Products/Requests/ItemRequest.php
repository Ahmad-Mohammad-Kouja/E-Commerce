<?php

namespace App\Src\Admin\Products\Requests;

use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Foundation\Http\FormRequest;
use App\Domains\Products\Enums\ItemStatusEnum;

/**
 * @property mixed $name
 * @property mixed $id
 * @property mixed $description
 * @property mixed $weight
 * @property mixed $quantity
 * @property mixed $status
 */
class ItemRequest extends FormRequest
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
            'category_id' => ['required', 'exists:categories,id'],
            'name' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'weight' => ['required', 'numeric', 'min:0'],
            'status' => ['required', new EnumValue(ItemStatusEnum::class, false)],
            // 'image' => ['required', 'image', 'mimes:jpeg,png,jpg,webp', 'max:1024'],
            'quantity' => ['required', 'numeric', 'min:0'],
        ];
    }
}
