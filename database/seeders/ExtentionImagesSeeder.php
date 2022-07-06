<?php

namespace Database\Seeders;

use App\Models\ExtentionImage;
use Illuminate\Database\Seeder;

class ExtentionImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['png','jpeg','jpg','gif'];
        $image = [];

        foreach ($types as $type){
            $image[] = ['type' => $type];
        }

        ExtentionImage::insert($image);
    }
}
