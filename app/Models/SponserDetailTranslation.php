<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SponserDetailTranslation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable =['location','description'];
    public $timestamps = false;

}
