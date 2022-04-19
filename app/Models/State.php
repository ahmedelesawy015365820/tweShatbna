<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class State extends Model implements TranslatableContract
{
    use HasFactory,Translatable;

    protected $guarded = ['id'];

    public $translatedAttributes = ['name'];

    protected $translationForeignKey = 'state_id';

    protected $hidden = ['translations'];

    // get status (active or inactive)

    public function getStatusAttribute($q)
    {
        return $q == 1? 'Active' : "InActive";
    }

    //start raletions

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function complement()
    {
        return $this->hasMany(Complement::class);
    }

}
