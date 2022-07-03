<?php

namespace Database\Seeders;

use App\Models\CompanyService;
use Illuminate\Database\Seeder;

class CompanyServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CompanyService::create([
            'ar' => ["name" => 'مقاولات'],
            'en' => ["name"=> "Construction"],
            'status' => true
        ]);
        CompanyService::create([
            'ar' => ["name" => 'تشطيبات عمومية'],
            'en' => ["name"=> "General finishes"],
            'status' => true
        ]);


    }
}
