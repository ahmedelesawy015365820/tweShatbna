<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Job::create([
            'ar' => ["name" => 'محاسب'],
            'en' => ["name"=> "accountant"],
        ]);
        Job::create([
            'ar' => ["name" => 'مبيعات'],
            'en' => ["name"=> "sales"],
            'Allow_adding_to_sales_team' => true
        ]);
    }
}
