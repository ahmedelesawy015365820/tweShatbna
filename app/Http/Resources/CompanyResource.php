<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'location' => $this->location,
            'trust' => $this->trust,
            'send' => $this->send
        ];
    }
}
