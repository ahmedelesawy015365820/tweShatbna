<?php

namespace Database\Seeders;

use App\Models\Architectural;
use App\Models\ExpectedBudget;
use App\Models\Unity;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Unity::create(['en' => ['name' => 'Shop'], 'ar' => ['name' => 'محل'] , 'status' => true]);

        Unity::create(['en' => ['name' => 'villa'], 'ar' => ['name' => 'فيلا'] , 'status' => true]);

        Unity::create(['en' => ['name' => 'duplex apartment'], 'ar' => ['name' => 'شقه دوبلاكس'] , 'status' => true]);

        Architectural::create(['en' => ['name' => 'modern'], 'ar' => ['name' => 'مودرن'] , 'status' => true]);

        Architectural::create(['en' => ['name' => 'classic'], 'ar' => ['name' => 'كلايسك'] , 'status' => true]);

        Architectural::create(['en' => ['name' => 'Islami'], 'ar' => ['name' => 'اسلامي'] , 'status' => true]);

        ExpectedBudget::create([
            'to' => '50',
            'from' => '200',
        ]);

        ExpectedBudget::create([
            'to' => '200',
            'from' => '500',
        ]);

        ExpectedBudget::create([
            'to' => '500',
            'from' => '1000',
        ]);
    }
}
