<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model implements TranslatableContract
{
    use HasFactory,Translatable;

    public $translatedAttributes = ['account_currency'];

    protected $translationForeignKey = 'setting_id';
    protected $guarded = ['id'];
    protected $hidden = ['settings'];
}
