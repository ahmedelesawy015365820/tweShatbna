<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesignPhasesTranslation extends Model
{
    use HasFactory;

    protected $fillable =['name'];
    public $timestamps = false;
    protected $table = 'design_phases_translations';
}
