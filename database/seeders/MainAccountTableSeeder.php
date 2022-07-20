<?php

namespace Database\Seeders;

use App\Models\MainAccount;
use Illuminate\Database\Seeder;

class MainAccountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MainAccount::create([
            'ar' => ["name" => 'الأصول'],
            'en' => ["name"=> "Assets"],
            'debit'=>0
        ]);
        MainAccount::create([
            'ar' => ["name" => 'الخصوم'],
            'en' => ["name"=> "Liabilities"],
            'debit'=>1
        ]);
        MainAccount::create([
            'ar' => ["name" => 'المصروفات'],
            'en' => ["name"=> "Expenses"],
            'debit'=>1
        ]);
        MainAccount::create([
            'ar' => ["name" => 'الأیرادات'],
            'en' => ["name"=> "Income"],
            'debit'=>0
        ]);

    }
}
