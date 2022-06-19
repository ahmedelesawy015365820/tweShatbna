<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyProject extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //start raletions


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function unity()
    {
        return $this->belongsToMany(Unity::class,'company_project_unities');
    }

    public function architectural()
    {
        return $this->belongsToMany(Architectural::class,'company_project_architecturals');
    }

    public function ExpectedBadget()
    {
        return $this->belongsTo(ExpectedBudget::class);
    }

    public function media()
    {
        return $this->morphMany(Media::class,'mediable');
    }

    public function vedio()
    {
        return $this->morphOne(Video::class,'mediable');
    }
}
