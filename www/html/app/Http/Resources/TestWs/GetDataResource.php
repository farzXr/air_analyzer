<?php

namespace App\Http\Resources\TestWs;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GetDataResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'id' => $this->id,
            'message' => $this->message
        ];
    }
}
