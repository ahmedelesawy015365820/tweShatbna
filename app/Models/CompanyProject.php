<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyProject extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    protected $appends = ['customDate'];

    public function getCustomDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    //start raletions


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function unity()
    {
        return $this->belongsToMany(Unity::class,'company_project_unities','company_project_id','unity_id');
    }

    public function architectural()
    {
        return $this->belongsToMany(Architectural::class,'company_project_architecturals','company_project_id','architectural_id');
    }

    public function ExpectedBadget()
    {
        return $this->belongsTo(ExpectedBudget::class,'expected_budget_id','id');
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
