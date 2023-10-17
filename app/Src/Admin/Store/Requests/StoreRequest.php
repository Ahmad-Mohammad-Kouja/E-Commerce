<?php

namespace App\Src\Admin\Store\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
        switch ($this->method()) {
            case 'POST':
                return [
                    'name' => 'required|max:255|unique:stores,name',
                    'city_id' => 'required|exists:cities,id',
                    'is_main' => 'sometimes|boolean',
                ];

            case 'PUT':
            case 'PATCH':
                return [
                    'name' => 'required|max:255|unique:stores,name,'.$this->route()->store->id,
                    'city_id' => 'required|exists:cities,id',
                    'is_main' => 'sometimes|boolean',
                ];

            default:
                break;
        }
    }
}
