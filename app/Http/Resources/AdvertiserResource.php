<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdvertiserResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'trust' => $this->trust
        ];
    }
}
