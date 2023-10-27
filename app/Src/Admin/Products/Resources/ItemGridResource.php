<?php

namespace App\Src\Admin\Products\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemGridResource extends JsonResource
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
            'image' => $this->image,
            'weight' => $this->weight,
            'quantity' => $this->quantity,
            'status' => $this->status,
            'category' => ['id' => $this->category->id, 'name' => $this->category->name],
        ];
    }
}
