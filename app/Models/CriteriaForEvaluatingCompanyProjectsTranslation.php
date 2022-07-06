<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CriteriaForEvaluatingCompanyProjectsTranslation extends Model
{
    use HasFactory;

    protected $fillable =['name'];
    public $timestamps = false;
    protected $table = 'criteria_company_translations';
}
