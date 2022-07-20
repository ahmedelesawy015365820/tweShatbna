<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainAccount extends Model implements TranslatableContract
{
    use HasFactory,Translatable;

    protected $guarded = ['id'];

    public $translatedAttributes = ['name'];

    protected $translationForeignKey = 'main_account_id';

    protected $hidden = ['main_accounts'];

    protected $appends = [
        'credit_amount',
        'debit_amount',
    ];

    public function getCreditAmountAttribute()
    {
        return $this->subAccounts->sum('credit_transaction');
    }
    public function getDebitAmountAttribute()
    {
        return $this->subAccounts->sum('debit_transaction');
    }

    public function subAccounts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(SubAccount::class,'main_account_id');
    }

}
