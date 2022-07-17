<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model implements TranslatableContract
{
    use HasFactory, \Astrotomic\Translatable\Translatable;

    public $translatedAttributes = ['title1','title2','title3'];

    protected $translationForeignKey = 'banner_id';


    protected $guarded = ['id'];
    protected $hidden = ['banner_id'];

    //start raletions

    public function media()
    {
        return $this->morphOne(Media::class,'mediable');
    }
}
