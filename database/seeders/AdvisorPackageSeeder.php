<?php

namespace Database\Seeders;

use App\Models\AdvisorPackage;
use Illuminate\Database\Seeder;

class AdvisorPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdvisorPackage::create([
            'ar' => ["name" => 'عادية',"description"=> "استلام مشروع من شركة تشطيبات"],
            'en' => ["name"=> "Normal","description"=> "Receipt of a project from a finishing company"],
            'price' => 1000,
        ]);
        AdvisorPackage::create([
            'ar' => ["name" => 'فضه',"description"=> "الأشراف على مشروع جديد من البداية"],
            'en' => ["name"=> "sliver","description"=> "Supervising a new project from the beginning"],
            'price' => 2000,
        ]);
        AdvisorPackage::create([
            'ar' => ["name" => 'الماس',"description"=> "مشكلة فى المشروع تحتاج الى مستشار شطبنا للفصل بها "],
            'en' => ["name"=> "diamond","description"=> "A problem in the project that needs a consultant, we have written off to separate it"],
            'price' => 3000,
        ]);
    }
}
