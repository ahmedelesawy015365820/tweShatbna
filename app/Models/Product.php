<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class Product extends Model implements TranslatableContract
{
    use HasFactory,SoftDeletes,Translatable;

    protected $guarded=[];
    public $translatedAttributes = ['name','description','divo'];
    protected $translationForeignKey = 'product_id';
    protected $hidden = ['product_translations'];

    protected $appends=['ex_date'];

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }


    public function order(){
        return $this->belongsToMany(Order::class,'orders_products','product_id','order_id')->withPivot(['quantity','price','sub_total','weight']);
    }

    // public function wishList(){
    //     return $this->belongsToMany(Customer::class,'wish_list');
    // }

    // public function related(){
    //     return $this->belongsToMany(Product::class,'related_products','product_id','related_id');
    // }

    public function cart(){
        return $this->belongsToMany(Client::class,'cart')->withPivot(['qty']);
    }

    public function images(){
        return $this->hasMany(Images::class);
    }


    // public function getSlugAttribute($value){
    //     return Str::slug($value);
    // }

    public function getImageAttribute($value){
        return asset('web/img/general/'.$value);
    }

    public function getExpiryDateAttribute($value){
        return date("Y-m-d\TH:m",strtotime($value));
    }


    public function getExDateAttribute()
    {
        return date("Y/m/d (H:i)",strtotime($this->expiry_date));
    }




    // public function reviews(){
    //     return $this->belongsToMany(Customer::class,'product_reviews')->withPivot('review','comment')->withTimestamps();
    // }

}
