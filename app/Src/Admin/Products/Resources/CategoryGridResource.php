<?php

namespace App\Src\Admin\Products\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryGridResource extends JsonResource
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
            'status' => $this->status,
            'parent_name' => $this->when($this->parent_id, fn () => $this->parent->name),
            'image' => $this->whenLoaded('media', fn () => new MediaResource($this->getFirstMedia('categories'))),
        ];
    }
}
