<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class AdvertisingSize extends Model
{
    use HasFactory,HasTranslations;

    public $translatable = ['name'];

    protected $guarded = ['id'];

    public function page_view()
    {
        return $this->belongsTo(AdvertisingPageAdvertisingView::class,'page_view_id','id');
    }


}