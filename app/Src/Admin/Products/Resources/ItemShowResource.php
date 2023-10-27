<?php

namespace App\Src\Admin\Products\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'image' => $this->image,
            'weight' => $this->weight,
            'quantity' => $this->quantity,
            'status' => $this->status,
            'category_id' => $this->category_id,
        ];
    }
}