<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DegreeDesign extends Model implements TranslatableContract
{
    use HasFactory,Translatable;

    public $translatedAttributes = ['name'];

    protected $translationForeignKey = 'degree_design_id';

    protected $guarded = ['id'];
    protected $hidden = ['translations'];

    public function  user()
    {
        return $this->belongsToMany(User::class,'user_degreer_designs','degree_design_id','user_id');
    }

}
