<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // get status (active or inactive)

    public function getStatusAttribute($q)
    {
        return $q == 1? 'Active' : "InActive";
    }

    //start raletions

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function complement()
    {
        return $this->hasMany(Complement::class);
    }

}
