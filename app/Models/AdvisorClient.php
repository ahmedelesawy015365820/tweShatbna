<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvisorClient extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function country()
    {
        return $this->belongsTo(Country::class,'country_id');
    }

    public function advisorPackage()
    {
        return $this->belongsTo(AdvisorPackage::class,'advisor_package_id');
    }
}
