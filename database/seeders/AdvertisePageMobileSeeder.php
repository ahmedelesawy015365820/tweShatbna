<?php

namespace Database\Seeders;

use App\Models\AdvertisingPageMobile;
use Illuminate\Database\Seeder;

class AdvertisePageMobileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $home = AdvertisingPageMobile::create([
            "en" => ["name" => "home page"],
            "ar"=>["name" => 'الصفحه الرئيسيه']
        ]);

        $home->views()->attach([1,2]);

        $branch = AdvertisingPageMobile::create([
            "en" => ["name" => "branch page"],
            "ar"=>["name" => 'الصفحه الفرعيه'],
        ]);

        $branch->views()->attach([1,2]);

        $product = AdvertisingPageMobile::create([
            "ar" => ["name" => "الصفحه المنتجات"],
            "en"=>["name" => 'product page'],
        ]);

        $product->views()->attach([1]);
    }
}
