<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpectedBudget extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //  start relation

    public function designProject()
    {
        return $this->hasMany(DesignProject::class);
    }

    public function companyProject()
    {
        return $this->hasMany(CompanyProject::class);
    }
}
