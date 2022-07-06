<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvisorDetail extends Model implements TranslatableContract
{
    use HasFactory,Translatable;

    protected $guarded = ['id'];
    public $translatedAttributes = ['name'];
    protected $translationForeignKey = 'advisor_detail_id';
    protected $hidden = ['advisor_details'];

    public function advisorPackage()
    {
        return $this->belongsTo(AdvisorPackage::class,'advisor_package_id');
    }
}
