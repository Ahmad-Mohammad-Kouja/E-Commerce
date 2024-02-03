<?php

namespace App\Src\Admin\Products\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DiscountGridResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'         => $this->id,
            'end_date'   => $this->end_date,
            'type'       => $this->type,
            'value'      => $this->value,
            'status'     => $this->status,
            'item'           => $this->whenLoaded('itemStore.item', function () {
                return [
                    'id' => $this->itemStore->item_id,
                    'name' => $this->itemStore->item->name,
                ];
            }),
        ];
    }
}
