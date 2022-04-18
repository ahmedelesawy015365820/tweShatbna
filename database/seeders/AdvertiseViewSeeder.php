<?php

namespace Database\Seeders;

use App\Models\AdvertisingView;
use Illuminate\Database\Seeder;

class AdvertiseViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $above = AdvertisingView::create([
            "en" => ["type" => "above"],
            "ar"=>["type" => 'فوق']
        ]);

        $above->pages()->attach([1,2]);

        $under = AdvertisingView::create([
            "en" => ["type" => "under"],
            "ar"=>["type" => 'تحت']
        ]);

        $under->pages()->attach([1]);

        $middle = AdvertisingView::create([
            "en" => ["type" => "middle"],
            "ar"=>["type" => 'الوسط']
        ]);

        $middle->pages()->attach([1]);

    }
}
