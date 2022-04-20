<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        State::create(['en' => ['name' => 'Alexandria'],'ar' => ['name' => 'اسكندريه'] , 'country_id' => 1, 'status' => true]);
        State::create(['en' => ['name' => 'Ismailia'],'ar' => ['name' => 'اسماعيليه'] , 'country_id' => 1, 'status' => true]);
        State::create(['en' => ['name' => 'Aswan'],'ar' => ['name' => 'اسوان'] , 'country_id' => 1, 'status' => true]);
        State::create(['en' => ['name' => 'Asyut'],'ar' => ['name' => 'اسيوط'] , 'country_id' => 1, 'status' => true]);
        State::create(['en' => ['name' => 'Luxor'],'ar' => ['name' => 'الاقصر'] , 'country_id' => 1, 'status' => true]);
        State::create(['en' => ['name' => 'cairo'],'ar' => ['name' => 'القاهره'] , 'country_id' => 1, 'status' => true]);
        State::create(['en' => ['name' => 'Bani Sweif'],'ar' => ['name' => 'بني سويف'] , 'country_id' => 1, 'status' => true]);
        State::create(['en' => ['name' => 'Port Said'],'ar' => ['name' => 'بورسعيد'] , 'country_id' => 1, 'status' => true]);
        State::create(['en' => ['name' => 'Giza'],'ar' => ['name' => 'جيزه'] , 'country_id' => 1, 'status' => true]);
        State::create(['en' => ['name' => 'Damietta'],'ar' => ['name' => 'دمياط'] , 'country_id' => 1, 'status' => true]);
        State::create(['en' => ['name' => 'Sharkia'],'ar' => ['name' => 'الشرقية'] , 'country_id' => 1, 'status' => true]);
    }
}
