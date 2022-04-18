<?php

namespace Database\Seeders;

use App\Models\Day;
use Illuminate\Database\Seeder;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Day::create([
             "en" => ["name" => "saturday"],
             "ar" =>["name" => 'السبت']
        ]);

        Day::create([
            "en" => ["name" => "Sunday"],
            "ar" =>["name" => 'الاحد']
        ]);

        Day::create([
            "en" => ["name" => "Monday"],
            "ar" =>["name" => 'الاثنين']
        ]);

        Day::create([
            "en" => ["name" => "Tuesday"],
            "ar" =>["name" => 'الثلاثاء']
        ]);

        Day::create([
            "en" => ["name" => "Wednesday"],
            "ar" =>["name" => 'الاربعاء']
        ]);

        Day::create([
            "en" => ["name" => "Thursday"],
            "ar" =>["name" => 'الخميس']
        ]);

        Day::create([
            "en" => ["name" => "Friday"],
            "ar" =>["name" => 'الجمعه']
        ]);


    }
}
