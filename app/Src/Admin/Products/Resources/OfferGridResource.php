<?php

namespace App\Src\Admin\Products\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OfferGridResource extends JsonResource
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
            'end_date'           => $this->end_date,
            'type'       => $this->type,
            'value'         => $this->value,
            'item_name'      => $this->whenLoaded('item', fn () => $this->item->name)
        ];
    }
}
