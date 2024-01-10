<?php

namespace App\Src\Admin\Products\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemStoreGridResource extends JsonResource
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
            'item_name' => $this->whenLoaded('item', fn () => $this->item->name),
            'price' => $this->price,
            'price_with_discount' => $this->price_with_discount,

            // 'stores' => ItemStoreResource::collection($this->whenLoaded('itemStores')),
        ];
    }
}
