<?php

namespace Database\Seeders;

use App\Models\AdvertisingPage;
use Illuminate\Database\Seeder;

class AdvertisePageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $home = AdvertisingPage::create([
            "en" => ["name" => "home page"],
            "ar"=>["name" => 'الصفحه الرئيسيه']
        ]);

        $home->views()->attach([1,2]);

        $branch =  AdvertisingPage::create([
            "en" => ["name" => "branch page"],
            "ar"=>["name" => 'الصفحه الفرعيه'],
        ]);

        $branch->views()->attach([1,2]);

        $product =  AdvertisingPage::create([
            "ar" => ["name" => "الصفحه المنتجات"],
            "en"=>["name" => 'product page'],
        ]);

        $product->views()->attach([1]);

    }
}
