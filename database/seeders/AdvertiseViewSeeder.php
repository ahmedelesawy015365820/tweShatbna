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


        $under = AdvertisingView::create([
            "en" => ["type" => "under"],
            "ar"=>["type" => 'تحت']
        ]);


        $middle = AdvertisingView::create([
            "en" => ["type" => "middle"],
            "ar"=>["type" => 'الوسط']
        ]);

    }
}
