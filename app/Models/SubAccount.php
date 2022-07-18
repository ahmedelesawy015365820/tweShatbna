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
        'count',
        'amount'
    ];

    public function getCountAttribute()
    {
        $num = 0;
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
                                           $num += 1;
                                        }
                                    }
                                    $num += 1;
                                }
                            }
                            $num += 1;
                        }
                    }
                    $num += 1;
                }
            }
            $num += 1;

        }
        return $num;
    }

    public function getAmountAttribute()
    {
        $num = $this->amount_transaction;
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
                                            $num += $five->amount_transaction;
                                        }
                                    }
                                    $num += $four->amount_transaction;
                                }
                            }
                            $num += $three->amount_transaction;
                        }
                    }
                    $num += $two->amount_transaction;
                }
            }
            $num += $first->amount_transaction;

        }
        return $num;
    }

    public function getAmountTransactionAttribute()
    {
        return  $this->restriction()->get()->sum('amount') ;
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
