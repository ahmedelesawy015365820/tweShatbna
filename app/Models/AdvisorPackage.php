<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvisorPackage extends Model implements TranslatableContract
{
    use HasFactory,Translatable;

    protected $guarded = ['id'];

    public $translatedAttributes = ['name','description'];

    protected $translationForeignKey = 'advisor_package_id';

    protected $hidden = ['advisor_packages'];

    public function advisorDetails()
    {
        return $this->hasMany(AdvisorDetail::class,'advisor_package_id');
    }

    public function advisorClient()
    {
        return $this->hasMany(AdvisorClient::class,'advisor_package_id');
    }
}
