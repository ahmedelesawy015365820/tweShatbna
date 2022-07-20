<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubAccount extends Model implements TranslatableContract
{
    use HasFactory,Translatable;

    protected $guarded = ['id'];

    public $translatedAttributes = ['name'];

    protected $translationForeignKey = 'sub_account_id';

    protected $hidden = ['sub_accounts'];

    protected $appends = [
        'credit_amount',
        'debit_amount',
        'count_elements'
    ];

    public function getCreditAmountAttribute()
    {
        $num = $this->credit_transaction;
        foreach ($this->children as $first){
            if (count($first->children)>0)
            {
                foreach ($first->children as $two)
                {
                    if (count($two->children)>0)
                    {
                        foreach ($two->children as $three)
                        {
                            if (count($three->children)>0)
                            {
                                foreach ($three->children as $four)
                                {
                                    if (count($four->children)>0)
                                    {
                                        foreach ($four->children as $five)
                                        {
                                            $num += $five->credit_transaction;
                                        }
                                    }
                                    $num += $four->credit_transaction;
                                }
                            }
                            $num += $three->credit_transaction;
                        }
                    }
                    $num += $two->credit_transaction;
                }
            }
            $num += $first->credit_transaction;

        }
        return $num;
    }

    public function getDebitAmountAttribute()
    {
        $num = $this->debit_transaction;
        foreach ($this->children as $first){
            if (count($first->children)>0)
            {
                foreach ($first->children as $two)
                {
                    if (count($two->children)>0)
                    {
                        foreach ($two->children as $three)
                        {
                            if (count($three->children)>0)
                            {
                                foreach ($three->children as $four)
                                {
                                    if (count($four->children)>0)
                                    {
                                        foreach ($four->children as $five)
                                        {
                                            $num += $five->debit_transaction;
                                        }
                                    }
                                    $num += $four->debit_transaction;
                                }
                            }
                            $num += $three->debit_transaction;
                        }
                    }
                    $num += $two->debit_transaction;
                }
            }
            $num += $first->debit_transaction;

        }
        return $num;
    }
    public function getCountElementsAttribute()
    {
        return  $this->children()->count() ;
    }

    public function getDebitTransactionAttribute()
    {
        return  $this->restriction()->where('debit',1)->get()->sum('amount') ;
    }

    public function getCreditTransactionAttribute()
    {
        return  $this->restriction()->where('debit',0)->get()->sum('amount') ;
    }


    //relations

    public function parent(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(SubAccount::class,'sub_account_id');
    }

    public function children(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(SubAccount::class,'sub_account_id');
    }

    public function mainAccount(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(MainAccount::class,'main_account_id');
    }

    public function restriction(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Restriction::class,'sub_account_id');
    }

    public function restrictionRecord(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(RestrictionRecord::class);
    }
}
