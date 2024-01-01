<?php

namespace App\Src\Admin\Store\Resources;

use App\Src\Admin\Products\Resources\MediaResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdGridResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'image' => $this->whenLoaded('media', fn () => new MediaResource($this->getFirstMedia('ads'))),
            'store' => [
                'id' => $this->store_id,
                'name' => $this->store->name,
            ],
        ];
    }
}
