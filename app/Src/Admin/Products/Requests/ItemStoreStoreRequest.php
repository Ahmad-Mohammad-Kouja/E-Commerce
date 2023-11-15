<?php

namespace App\Src\Admin\Products\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Domains\Products\Rules\PricesCountMatchesStoresCount;

class ItemStoreStoreRequest extends FormRequest
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
            'items.*.prices'=> ['array',new PricesCountMatchesStoresCount()],
            'items.*.stores' => ['array'],
        ];
    }
}
