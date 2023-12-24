<?php

namespace App\Src\Admin\Products\Requests;

use App\Domains\Products\Enums\CategoryStatusEnum;
use App\Domains\Products\Rules\CategoryHasParentRule;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequest extends FormRequest
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
            'parent_id' => ['nullable', 'integer', new CategoryHasParentRule],
            'name' => ['string', 'required'],
            'description' => ['nullable', 'string'],
            'status' => ['required', new EnumValue(CategoryStatusEnum::class, false)],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
        ];
    }
}
