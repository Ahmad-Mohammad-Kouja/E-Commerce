<?php

namespace App\Src\Admin\Stores\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StoreResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'store_name' => $this->name,
            'store_city' => $this->city->name
        ];
    }
}
