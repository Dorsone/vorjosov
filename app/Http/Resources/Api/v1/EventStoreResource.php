<?php

namespace App\Http\Resources\Api\v1;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class EventStoreResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this['id'],
            'spent_time' => $this['spent_time'] . ' seconds',
            'spent_ram' => $this['spent_memory'] . ' megabytes',
        ];
    }
}
