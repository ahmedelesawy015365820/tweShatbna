<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class AdvertisingView extends Model implements TranslatableContract
{
    use HasFactory,Translatable;

    protected $guarded = ['id'];

    public $translatedAttributes = ['type'];

    protected $translationForeignKey = 'view_id';
    protected $hidden = ['translations'];

    public function pages()
    {
        return $this->belongsToMany(AdvertisingPage::class,'advertising_page_advertising_views','view_id','page_id')->withTimestamps();
    }

    public function page_mobile()
    {
        return $this->belongsToMany(AdvertisingPageMobile::class,'advertising_page_mobile_advertising_views','view_id','page_mobile_id')->withTimestamps();
    }

}
