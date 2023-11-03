<?php

namespace App\Src\Admin\Stores\Resources;

use App\Src\User\Entities\Resources\UserGridResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RegionGridResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'city' => $this->city->name,
            'name' => $this->name,
            'delivery_fee' => $this->delivery_fee,
        ];
    }
}
