<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageViewMobilePackage extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'page_view_mobile_packages';

}
