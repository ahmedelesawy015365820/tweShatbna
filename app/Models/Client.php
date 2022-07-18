<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //start raletions

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function media()
    {
        return $this->morphMany(Media::class,'mediable');
    }


    //designers complaints
    public function designersComplaints()
    {
        return $this->hasMany(DesignersComplaint::class);
    }



    public function cart(){
        return $this->belongsToMany(Product::class,'cart')->withPivot(['qty']);
    }
    public function orders(){
        return $this->hasMany(Order::class,'client_id','id');
    }


}
