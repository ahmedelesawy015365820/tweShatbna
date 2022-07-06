<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvisorOne extends Model implements TranslatableContract
{
    use HasFactory,Translatable;
    protected $guarded = ['id'];
    public $translatedAttributes = ['name','description'];
    protected $translationForeignKey = 'advisor_one_id';
    protected $hidden = ['advisor_ones'];
}
