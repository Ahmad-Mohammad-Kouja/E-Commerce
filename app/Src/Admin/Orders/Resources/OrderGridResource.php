<?php

namespace App\Src\Admin\Orders\Resources;

use App\Src\Admin\Stores\Resources\AddressGridResource;
use App\Src\Admin\Stores\Resources\StoreGridResource;
use App\Src\User\Entities\Resources\UserGridResource;
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
            'id' => $this->id,
            'user' => (new UserGridResource($this->user_id)),
            'store_id' => (new StoreGridResource($this->store_id)),
            'address_id' => (new AddressGridResource($this->address_id)),
            'order_status' => $this->order_status,
            'payment_status' => $this->payment_status,
            'delivery_type' => $this->delivery_type,
            'time_delivery' => $this->time_delivery,
            'current_location' => $this->current_location,
        ];
    }
}
