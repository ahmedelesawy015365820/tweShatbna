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

        AdvertisingPage::create([
            "en" => ["name" => "home page"],
            "ar"=>["name" => 'الصفحه الرئيسيه']
        ]);

        AdvertisingPage::create([
            "en" => ["name" => "branch page"],
            "ar"=>["name" => 'الصفحه الفرعيه'],
        ]);

        AdvertisingPage::create([
            "ar" => ["name" => "الصفحه المنتجات"],
            "en"=>["name" => 'product page'],
        ]);
    }
}
