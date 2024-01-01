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
            'id' => $this->id,
            'name' => $this->name,
            'quantity' => $this->quantity,
            'status' => $this->status,
            'category_name' => $this->whenLoaded('category', fn () => $this->category->name),
            'image' => $this->whenLoaded('media', fn () => new MediaResource($this->getFirstMedia('items'))),
        ];
    }
}
