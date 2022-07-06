<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyPhasesTranslation extends Model
{
    use HasFactory;
    protected $fillable =['name'];
    public $timestamps = false;
    protected $table = 'company_phases_translations';
}
