<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TargetPlan extends Model implements TranslatableContract
{
    use HasFactory,Translatable;

    protected $guarded = ['id'];

    public $translatedAttributes = ['name'];

    protected $translationForeignKey = 'target_plan_id';

    protected $hidden = ['target_plans'];

    //relation

    public function targetType()
    {
        return $this->belongsTo(TargetType::class,'target_type_id');
    }

    public function target()
    {
        return $this->hasMany(Target::class);
    }
}
