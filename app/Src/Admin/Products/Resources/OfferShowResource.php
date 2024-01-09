<?php

namespace App\Src\Admin\Products\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OfferShowResource extends JsonResource
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
            'start_date'     => $this->start_date,
            'end_date'       => $this->end_date,
            'type'           => $this->type,
            'value'          => $this->value,
            'item'      => [
                'id'    => $this->item_id,
                'name'  => $this->whenLoaded('item', fn () => $this->item->name),
            ],
        ];
    }
}
