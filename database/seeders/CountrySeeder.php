<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::create([ 'en'=> ['name'=>  'Egypt'],'ar'=> ['name'=>  'مصر'], 'status' => true,'code' => '+20']) ;
        Country::create(['en'=> ['name'=>  'Emirates'],'ar'=> ['name'=>  'الامارات'], 'status' => true,'code' => '+967']);
        Country::create(['en'=>['name'=>  'Sadui'],'ar'=> ['name'=>  'السعوديه'], 'status' => true,'code' => '+966']) ;



        $mediaCO1 = Country::whereId(1)->first();
        $mediaCO1->media()->create([
            'file_name' => 'egypt.png' ,
            'file_size' => rand(200,300),
            'file_type' => 'jpg/image',
            'file_sort' => 1
        ]);

        $mediaCO2 = Country::whereId(2)->first();
        $mediaCO2->media()->create([
            'file_name' => 'emirates.png' ,
            'file_size' => rand(200,300),
            'file_type' => 'png/image',
            'file_sort' => 1
        ]);

        $mediaCO3 = Country::whereId(3)->first();
        $mediaCO3->media()->create([
            'file_name' => 'sadui.png' ,
            'file_size' => rand(200,300),
            'file_type' => 'png/image',
            'file_sort' => 1
        ]);

    }
}
