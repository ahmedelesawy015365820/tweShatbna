<?php

namespace Database\Seeders;

use App\Models\DegreeDesign;
use Illuminate\Database\Seeder;

class DegreeDesignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doctorate = DegreeDesign::create([
            'ar' => ["name" => 'دكتوراة'],
            'en' => ["name"=> "doctorate"],
            'status' => true
        ]);
        $Master = DegreeDesign::create([
            'ar' => ["name" => 'ماجستير'],
            'en' => ["name"=> "Master's"],
            'status' => true
        ]);

        $Bachelor  = DegreeDesign::create([
            'ar' => ["name" => 'باكلوريوس'],
            'en' => ["name"=> "Bachelor of"],
            'status' => true
        ]);

    }
}
