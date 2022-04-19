<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Country extends Model implements TranslatableContract
{
    use HasFactory,Translatable;

    protected $guarded = ['id'];

    public $translatedAttributes = ['name'];

    protected $translationForeignKey = 'country_id';

    protected $hidden = ['translations'];

    // get status (active or inactive)

    public function getStatusAttribute($q)
    {
        return $q == 1? 'Active' : "InActive";
    }

    protected $appends = [
        'image_path'
    ];

    //append img path

    public function getImagePathAttribute(): string
    {
        return asset('web/img/country/'.$this->media->file_name);
    }

    //start raletions

    public function media()
    {
        return $this->morphOne(Media::class,'mediable');
    }

    public function states()
    {
        return $this->hasMany(State::class);
    }

    public function complement()
    {
        return $this->hasMany(Complement::class,'country_id');
    }

}
