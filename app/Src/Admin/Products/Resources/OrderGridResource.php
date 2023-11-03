<?php

namespace App\Src\Admin\Products\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderGridResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'customer_details' => [
                'customer_first_name' => $this->first_name,
                'customer_last_name' => $this->last_name,
                'customer_email' => $this->email,
            ],
           'item_order_details' => [
               'store_name' => $this->store_name,
               'item_name' => $this->item_name,
               'item_price' => $this->price,
               'item_quantity' => $this->quantity,
           ],
            'order_details' => [
                'order_status' => $this->order_status,
                'payment_status' => $this->payment_status,
                'delivery_type' => $this->delivery_type,
                'time_delivery' => $this->time_delivery,
                'current_location' => $this->current_location,
            ],
            'order_price' => $this->order_price,
        ];
    }
}
