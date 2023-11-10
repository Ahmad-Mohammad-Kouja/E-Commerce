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
            'id'      => $this->id,
            'name'    => $this->name,
            'description' => $this->description,
            'weight'      => $this->weight,
            'quantity'    => $this->quantity,
            'status'      => $this->status,
            'category'    => [
                'id'    => $this->category_id,
                'name'  => $this->whenLoaded('category', fn () => $this->category->name),
            ],
            'image'  => $this->whenLoaded('media', fn () => new MediaResource($this->media)),
        ];
    }
}
