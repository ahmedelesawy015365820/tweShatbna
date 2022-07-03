<?php

namespace Database\Seeders;

use App\Models\DesignService;
use Illuminate\Database\Seeder;

class DesignServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Furniture = DesignService::create([
            'ar' => ["name" => 'تصميمم اثاث'],
            'en' => ["name"=> "Furniture Design"],
            'status' => true
        ]);
        $interior = DesignService::create([
            'ar' => ["name" => 'تصميم داخلي'],
            'en' => ["name"=> "interior design"],
            'status' => true
        ]);


    }
}
