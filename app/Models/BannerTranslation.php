<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerTranslation extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable =['title1','title2','title3'];
    public $timestamps = false;
}
