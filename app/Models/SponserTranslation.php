<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SponserTranslation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable =['name','description'];
    public $timestamps = false;
}
