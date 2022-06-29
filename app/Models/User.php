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



class User extends Authenticatable implements JWTSubject ,MustVerifyEmail
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

    protected $appends = ['imagePath'];

    public function getImagePathAttribute(): string
    {
        return asset('web/img/user/'.$this->id .'/'.$this->media->file_name);
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }


    public function getJWTCustomClaims()
    {
        return [];
    }

    //start raletions

    public function media()
    {
        return $this->morphOne(Media::class,'mediable');
    }

    public function accounts() {
        return $this->hasMany(SocialAccount::class);
    }


        public function complement()
    {
        return $this->hasOne(Complement::class);
    }

    public function company()
    {
        return $this->hasOne(Company::class);
    }

    public function advertiser()
    {
        return $this->hasOne(Advertiser::class);
    }

    public function employee()
    {
        return $this->hasOne(Employee::class);
    }


    public function  packageSale()
    {
        return $this->belongsToMany(PackageSale::class,'package_sale_users','user_id','package_sale_id');
    }


    public function  schedule()
    {
        return $this->hasMany(AdvertiseSchedule::class,'user_id');
    }

    public function banks()
    {
        return $this->hasMany(Bank::class,'user_id');
    }

    public function  CompanyService()
    {
        return $this->belongsToMany(CompanyService::class,'user_company_services','user_id','company_service_id');
    }

    public function CompanyDetail()
    {
        return $this->hasOne(CompanyDetail::class);
    }

    public function  designService()
    {
        return $this->belongsToMany(DesignService::class,'user_design_services','user_id','design_service_id');
    }

    public function  designDegree()
    {
        return $this->belongsToMany(DegreeDesign::class,'user_degreer_designs','user_id','degree_design_id');
    }

    public function designDesScience()
    {
        return $this->hasOne(DesignDesScience::class);
    }

    public function designDetail()
    {
        return $this->hasOne(DesignDetail::class);
    }

    public function designer()
    {
        return $this->hasOne(Designer::class);
    }

    public function client()
    {
        return $this->hasOne(Client::class);
    }

    public function designProject()
    {
        return $this->hasMany(DesignProject::class);
    }

    public function companyProject()
    {
        return $this->hasMany(CompanyProject::class);
    }

    public function incomeAndExpense(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(IncomeAndExpense::class);
    }


    public function addShowDesign()
    {
        return $this->hasMany(AddShowDesign::class);
    }


    //end raletions


    public function sendPasswordResetNotification($token)
    {

        $url = 'http://shatbna.com/'.app()->getLocale().'/reset-password?token=' . $token;

        $this->notify(new ResetPasswordNotification($url));
    }

    public function receivesBroadcastNotificationsOn()
    {
        return 'App.Models.User.'.$this->id;
    }

}
