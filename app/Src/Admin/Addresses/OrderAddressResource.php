<?php

namespace App\Src\Admin\Addresses;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderAddressResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'Address_name' => $this->name,
            'street' => $this->street,
            'building_number' => $this->building_number,
            'apartment_number' => $this->apartment_number,
            'additional_information' => $this->additional_information,
        ];
    }
}
