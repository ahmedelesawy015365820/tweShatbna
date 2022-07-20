<?php

namespace Database\Seeders;

use App\Models\TargetType;
use Illuminate\Database\Seeder;

class TargetTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TargetType::create([
            'ar' => ["name" => 'شھر'],
            'en' => ["name"=> "month"],
        ]);

        TargetType::create([
            'ar' => ["name" => 'ربع سنوي'],
            'en' => ["name"=> "Quarterly"],
        ]);

        TargetType::create([
            'ar' => ["name" => 'نصف سنوى'],
            'en' => ["name"=> "biannual"],
        ]);

        TargetType::create([
            'ar' => ["name" => 'سنه'],
            'en' => ["name"=> "year"],
        ]);
    }
}
