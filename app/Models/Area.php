<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class Area extends Model implements TranslatableContract
{
    use HasFactory,Translatable;
    protected $guarded = ['id'];

    public $translatedAttributes = ['name'];
    protected $translationForeignKey = 'area_id';


    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function cost()
    {
        return $this->hasMany(AreaCost::class);
    }

    // public function country()
    // {
    //     return $this->state()->country();
    // }

}
