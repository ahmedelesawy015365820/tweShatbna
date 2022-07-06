<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageSale extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'package_sales';

    // start relation

    public function  package()
    {
        return $this->belongsTo(AdvertisingPackage::class,'advertising_package_id');
    }

    public function  user()
    {
        return $this->belongsToMany(User::class,'package_sale_users','package_sale_id','user_id');
    }

    public function media()
    {
        return $this->morphMany(Media::class,'mediable');
    }

}
