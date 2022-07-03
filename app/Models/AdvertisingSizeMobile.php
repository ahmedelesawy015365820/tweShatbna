<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class AdvertisingSizeMobile extends Model
{
    use HasFactory,HasTranslations;

    public $translatable = ['name'];

    protected $guarded = ['id'];


    //  start raletion
    //
    public function sizeMobile()
    {
        return $this->belongsTo(AdvertisingPageMobileAdvertisingView::class,'page_mobile_view_id','id');
    }

}
