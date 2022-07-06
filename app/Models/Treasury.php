<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treasury extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    protected $guarded = ['id'];

    public $translatedAttributes = ['name'];

    protected $translationForeignKey = 'treasury_id';

    protected $hidden = ['translations'];

    protected $appends = [
        'amount',
        'income',
        'expense',
    ];

    public function getAmountAttribute()
    {
        return $this->income - $this->expense;
    }

    public function getIncomeAttribute()
    {
        $income = $this->incomeAndExpense->whereNotNull('income_id')->sum('amount');
        $transfer = $this->toTransferringTreasury->sum('amount');
        return $income + $transfer;
    }

    public function getExpenseAttribute()
    {
        $expense = $this->incomeAndExpense->whereNotNull('expense_id')->sum('amount');
        $transfer = $this->fromTransferringTreasury->sum('amount');
        return $expense + $transfer;
    }

    //relations

    public function treasuryParent(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Treasury::class, 'treasury_id');
    }

    public function children(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Treasury::class, 'treasury_id');
    }

    public function incomeAndExpense(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(IncomeAndExpense::class);
    }

    public function fromTransferringTreasury(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(TransferringTreasury::class, 'from_treasury_id');
    }

    public function toTransferringTreasury(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(TransferringTreasury::class, 'to_treasury_id');
    }

}
