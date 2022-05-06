<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DesignResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'gender' => $this->gender,
            'birth' => $this->birth,
            'trust' => $this->trust,
            'send' => $this->send
        ];
    }
}
