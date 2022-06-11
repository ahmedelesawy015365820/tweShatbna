<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unity extends Model implements TranslatableContract
{
    use HasFactory,Translatable;
    public $translatedAttributes = ['name'];

    protected $translationForeignKey = 'unity_id';


    protected $guarded = ['id'];
    protected $hidden = ['translations'];
}
