<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponser extends Model implements TranslatableContract
{
    use HasFactory,Translatable;
    protected $guarded = ['id'];
    public $translatedAttributes = ['name','description'];
    protected $translationForeignKey = 'sponser_id';
    protected $hidden = ['translations'];

    //start raletions

    public function media()
    {
        return $this->morphOne(Media::class,'mediable');
    }

    public function details()
    {
        return $this->hasOne(SponserDetail::class);
    }
}
