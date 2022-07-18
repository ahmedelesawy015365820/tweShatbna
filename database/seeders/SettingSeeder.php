<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Setting::create([
            'commission_design' => 10,
            'ar' => ["account_currency" => 'جنيه'],
            'en' => ["account_currency"=> "L.E"],
        ]);

    }

}
