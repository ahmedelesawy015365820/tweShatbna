<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Architectural extends Model implements TranslatableContract
{
    use HasFactory, Translatable;
    public $translatedAttributes = ['name'];

    protected $translationForeignKey = 'architectural_id';


    protected $guarded = ['id'];
    protected $hidden = ['translations'];

    //   start relations

    public function designProject()
    {
        return $this->belongsToMany(DesignProject::class,'design_project_architecturals','architectural_id','design_project_id');
    }

    public function companyProject()
    {
        return $this->belongsToMany(CompanyProject::class,'company_project_architecturals','architectural_id','company_project_id');
    }
}
