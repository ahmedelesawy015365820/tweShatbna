<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SponserDetail extends Model implements TranslatableContract
{
    use HasFactory,Translatable;
    protected $guarded = ['id'];
    public $translatedAttributes = ['location','description'];
    protected $translationForeignKey = 'sponser_id';

    //start raletions

    public function media()
    {
        return $this->morphMany(Media::class,'mediable');
    }

    public function sponser()
    {
        return $this->belongsTo(Sponser::class);
    }
}
