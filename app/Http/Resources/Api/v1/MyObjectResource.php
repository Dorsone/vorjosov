<?php

namespace App\Http\Resources\Api\v1;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MyObjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'data' => $this->data,
            'user' => $this->whenLoaded('user'),
        ];
    }
}
