<?php

namespace Database\Seeders;

use App\Models\AdvertisingPackage;
use Faker\Factory;
use Illuminate\Database\Seeder;

class AdvertisePackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $gold = AdvertisingPackage::create([
            'ar' => ["name" => 'ذهب'],
            'period' => 7,
            'visiter_num' => 1000,
            'price' => 100,
            'en' => ["name"=> "gold"],
            'status' => true
        ]);

        AdvertisingPackage::create([
            'ar' => ["name" => 'فضه'],
            'en' => ["name"=> "sliver"],
            'period' => 7,
            'visiter_num' => 1000,
            'price' => 100,
            'status' => true
        ]);

        AdvertisingPackage::create([
            'ar' => ["name" => 'الماس'],
            'en' => ["name"=> "diamond"],
            'period' => 7,
            'visiter_num' => 1000,
            'price' => 100,
            'status' => true
        ]);


    }
}
