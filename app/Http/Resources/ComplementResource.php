<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ComplementResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'country' => new CountryResource($this->country),
            'state' => new StateResource($this->state),
            'phone' => $this->phone,
            'phoneSecond' => $this->phone_second,
            'nameCompany' => $this->nameCompany
        ];
    }
}
