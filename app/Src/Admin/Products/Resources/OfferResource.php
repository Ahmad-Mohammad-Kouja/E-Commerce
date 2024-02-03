<?php

namespace App\Src\Admin\Products\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OfferResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'             => $this->id,
            'title'          => $this->title,
            'description'    => $this->description,
            'status'         => $this->status,
            'start_date'     => $this->start_date,
            'end_date'       => $this->end_date,
            'price'          => $this->price,
            'store_name'     => $this->whenLoaded('store', fn () => $this->store->name),
            'image'          => $this->whenLoaded('media', fn () => new MediaResource($this->getFirstMedia('offers'))),
        ];
    }
}
