<?php

namespace App\Http\Resources;

use App\Models\Advertiser;
use App\Models\AdvertisingPackage;
use App\Models\PackageSaleUser;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class PackageSaleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'check' => $this->check,
            'accept' => $this->accept,
            'advertising_package' => new AdvertisingPackageResource(AdvertisingPackage::find($this->advertising_package_id)),
            'user' => new UserResource(User::find(PackageSaleUser::where("package_sale_id",$this->id)->first()->user_id)),
            'advertiser' => new AdvertiserResource(Advertiser::whereUserId(PackageSaleUser::where("package_sale_id",$this->id)->first()->user_id)->first()),
        ];
    }
}
