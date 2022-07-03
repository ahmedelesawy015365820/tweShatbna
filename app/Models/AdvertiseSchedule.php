<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertiseSchedule extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'advertise_schedules';

    //start raletions

    public function packages()
    {
        return $this->belongsTo(AdvertisingPackage::class,'advertising_package_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
