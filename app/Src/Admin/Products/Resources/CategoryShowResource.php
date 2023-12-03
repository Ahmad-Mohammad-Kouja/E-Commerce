<?php

namespace App\Src\Admin\Products\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'          => $this->id,
            'name'        => $this->name,
            'description' => $this->description,
            'status'      => $this->status,
            'parent'    => [
                'id'    => $this->parent_id,
                'name'  => $this->whenLoaded('parent', fn () => $this->parent->name),
            ],
            'image'  => $this->whenLoaded('media', fn () => new MediaResource($this->getFirstMedia('categories'))),
        ];
    }
}
