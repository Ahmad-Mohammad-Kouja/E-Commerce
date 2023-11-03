<?php

namespace App\Src\Admin\Products\Resources;

use App\Src\Admin\Addresses\OrderAddressResource;
use App\Src\Admin\Entities\Resources\UserResource;
use App\Src\Admin\Stores\Resources\AddressGridResource;
use App\Src\Admin\Stores\Resources\StoreGridResource;
use App\Src\Admin\Stores\Resources\StoreResource;
use App\Src\User\Entities\Resources\UserGridResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'order_id' => $this->id,
            'user_details' => (new UserResource($this->user)),
            'store_details' => (new StoreResource($this->store)),
            'address_details' => (new OrderAddressResource($this->address)),

            'payment_status' => $this->payment_status,
            'payment_details' => $this->when($this->payment , (new PaymentResource($this->payment)) ),

            'order_status' => $this->order_status,
            'delivery_type' => $this->delivery_type,
            'time_delivery' => $this->time_delivery,
            'current_location' => $this->current_location,
        ];
    }
}
