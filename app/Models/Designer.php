<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designer extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'birth' => 'datetime',
    ];

    //start raletions

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function media()
    {
        return $this->morphMany(Media::class,'mediable');
    }


    //complaints from client
    public function complaints()
    {
        return $this->hasMany(DesignersComplaint::class);
    }

}
