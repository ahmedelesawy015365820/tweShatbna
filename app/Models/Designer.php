<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designer extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getGenderAttribute($q)
    {
        return $q == 1? 'Male' : "Female";
    }

    protected $casts = [
        'birth' => 'datetime',
    ];

    //start raletions

    public function user()
    {
        return $this->hasOne(User::class);
    }

}
