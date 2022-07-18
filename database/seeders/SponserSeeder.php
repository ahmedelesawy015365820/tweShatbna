<?php

namespace Database\Seeders;

use App\Models\Sponser;
use Illuminate\Database\Seeder;

class SponserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sponser1 = Sponser::create([
            'ar' => [
                "name" => 'شركه eeT',
                "description" => 'من اكبر مصنعي الاساس في مصر',
            ],
            'en' => [
                "name" => 'eet company',
                "description" => 'One of the largest base manufacturers in Egypt',
            ],
        ]);

        $sponser1->media()->create([
            'file_name' => 'eet.jpg' ,
            'file_size' => 'image/png',
            'file_type' => '6754',
            'file_sort' => 1
        ]);


        $sponser2 = Sponser::create([
            'ar' => [
                "name" => 'شركه eeT',
                "description" => 'من اكبر مصنعي الاساس في مصر',
            ],
            'en' => [
                "name" => 'eet company',
                "description" => 'One of the largest base manufacturers in Egypt',
            ],
        ]);

        $sponser2->media()->create([
            'file_name' => 'eet.jpg' ,
            'file_size' => 'image/png',
            'file_type' => '6754',
            'file_sort' => 1
        ]);

        $sponser3 = Sponser::create([
            'ar' => [
                "name" => 'شركه eeT',
                "description" => 'من اكبر مصنعي الاساس في مصر',
            ],
            'en' => [
                "name" => 'eet company',
                "description" => 'One of the largest base manufacturers in Egypt',
            ],
        ]);

        $sponser3->media()->create([
            'file_name' => 'eet.jpg' ,
            'file_size' => 'image/png',
            'file_type' => '6754',
            'file_sort' => 1
        ]);

        $sponser4 = Sponser::create([
            'ar' => [
                "name" => 'شركه eeT',
                "description" => 'من اكبر مصنعي الاساس في مصر',
            ],
            'en' => [
                "name" => 'eet company',
                "description" => 'One of the largest base manufacturers in Egypt',
            ],
        ]);

        $sponser4->media()->create([
            'file_name' => 'eet.jpg' ,
            'file_size' => 'image/png',
            'file_type' => '6754',
            'file_sort' => 1
        ]);
    }
}
