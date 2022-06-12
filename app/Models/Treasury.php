<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treasury extends Model implements TranslatableContract
{
    use HasFactory,Translatable;

    protected $guarded = ['id'];

    public $translatedAttributes = ['name'];

    protected $translationForeignKey = 'treasury_id';

    protected $hidden = ['translations'];

    //append
    protected $appends = [
        'income','expense'
    ];

    public function getExpenseAttribute()
    {
        return 0;
    }
    public function getIncomeAttribute()
    {
        return 0;
    }

    //relations

    public function treasuryParent(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Treasury::class,'treasury_id');
    }

    public function children(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Treasury::class,'treasury_id');
    }


}
