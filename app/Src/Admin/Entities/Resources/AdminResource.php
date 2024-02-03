<?php

namespace App\Src\Admin\Entities\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdminResource extends JsonResource
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
            'username' => $this->name,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'status' => $this->status,
        ];
    }
}
