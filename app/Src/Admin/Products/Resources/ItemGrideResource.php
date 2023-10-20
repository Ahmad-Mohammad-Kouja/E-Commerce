<?php

namespace App\Src\Admin\Products\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemGrideResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'category_name' => $this->category->name,
            'category_id' => $this->category->id,
            'name' => $this->name,
            'description' => $this->description,
            'image' => $this->image,
            'weight' => $this->weight,
            'quantity' => $this->quantity,
            'status' => $this->status,
        ];
    }
}
