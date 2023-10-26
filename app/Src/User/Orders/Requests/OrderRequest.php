<?php

namespace App\Src\Admin\Orders\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrderRequest extends FormRequest
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
            'user_id' => ['required' , 'exists:users'],
            'store_id' => ['required' , 'exists:stores'],
            'address_id' => ['required' , 'exists:addresses'],
            'order_status' => ['required' , Rule::in(['in-progress', 'delivered'])],
            'payment_status' => ['required' , Rule::in(['paid', 'unpaid'])],
            'delivery_type' => ['required' , Rule::in(['pickup', 'delivery'])],
            'time_delivery ' => ['required' , 'date'],
            'current_location' => ['required' , 'string'],
        ];
    }
}
