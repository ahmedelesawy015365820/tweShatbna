<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Order extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function products(){
        return $this->belongsToMany(Product::class,'orders_products','order_id','product_id')->withPivot(['quantity','price','sub_total','weight']);

    }

    public function customer(){
        return $this->belongsTo(Client::class,'client_id','id');
    }


    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function state()
    {
        return $this->belongsTo(State::class);
    }
    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y/m/d  (H:i)');
    }


    public function scopeGetOrdersThroughMonth($q,$year,$month){
        return $q->whereYear('created_at',$year)->whereMonth('created_at',$month)
        ->orderBy('created_at')->get()->groupBy(function($data) {
            //week
            return Carbon::parse($data->created_at)->format('W');

        });
    }


}
