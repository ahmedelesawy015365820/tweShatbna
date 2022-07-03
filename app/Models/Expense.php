<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model implements TranslatableContract
{
    use HasFactory,Translatable;

    protected $guarded = ['id'];

    public $translatedAttributes = ['name'];

    protected $translationForeignKey = 'expense_id';

    protected $hidden = ['expenses'];

    //relations

    public function parent(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Expense::class,'expense_id');
    }

    public function children(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Expense::class,'expense_id');
    }

    public function incomeAndExpense(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(IncomeAndExpense::class);
    }

}
