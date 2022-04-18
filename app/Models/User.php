<?php

namespace App\Models;

use App\Notifications\ResetPasswordNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;



class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable, HasRoles;

    protected $guarded = ['id'];

    // set hash password

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];


    // start JWT

    protected $casts = [
        'email_verified_at' => 'datetime',
        'role_name' => 'array'
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }


    public function getJWTCustomClaims()
    {
        return [];
    }

    //start raletions

    public function complement()
    {
        return $this->hasOne(Complement::class);
    }

    public function company()
    {
        return $this->hasOne(Company::class);
    }

    public function designer()
    {
        return $this->hasOne(Designer::class);
    }

    public function advertiser()
    {
        return $this->hasOne(Advertiser::class);
    }

    public function  packageSale()
    {
        return $this->belongsToMany(PackageSale::class,'package_sale_users','user_id','package_sale_id');
    }

    public function  schedule()
    {
        return $this->hasMany(AdvertiseSchedule::class,'user_id');
    }

    //end raletions


    public function sendPasswordResetNotification($token)
    {

        $user = Auth::guard('api')->user();

        if($user->auth_id == 2){
            $url = 'web/reset-password?token=' . $token;
        }elseif ($user->auth_id == 1){
            $url = 'dashboard/reset-password?token=' . $token;
        }

        $this->notify(new ResetPasswordNotification($url));
    }


}
