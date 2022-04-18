<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdvertisingPackageResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'period' => $this->period,
            'visiter_num' => $this->visiter_num,
            'price' => $this->price,
            'description' => $this->description,
        ];
    }
}
