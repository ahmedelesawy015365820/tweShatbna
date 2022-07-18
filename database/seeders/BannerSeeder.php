<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $banner1 = Banner::create([
            'ar' => [
                "title1" => 'حصلنا علي ثقه اكثر من 2000.000 مستخدم',
                "title2" => 'احصل علي افضل',
                "title3" => 'شركات التشطيبات و الديزاينر حول العالم',
            ],
            'en' => [
                "title1" => 'TRUSED BY OVER 2M+ USERS',
                "title2" => 'Get the best',
                "title3" => 'Finishes and designers around the world',
            ],
        ]);

        $banner1->media()->create([
            'file_name' => 'Slider.jfif' ,
            'file_size' => 'image/png',
            'file_type' => '6754',
            'file_sort' => 1
        ]);


    }
}
