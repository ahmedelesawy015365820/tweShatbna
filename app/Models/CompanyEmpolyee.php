<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyEmpolyee extends Model  implements TranslatableContract
{
    use HasFactory, \Astrotomic\Translatable\Translatable;

    public $translatedAttributes = ['name','job'];

    protected $translationForeignKey = 'company_empolyee_id';

    protected $guarded = ['id'];
    protected $hidden = ['translations'];


    //start raletions

    public function media()
    {
        return $this->morphOne(Media::class,'mediable');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
