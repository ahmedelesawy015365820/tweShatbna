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
        State::create(['en' => ['name' => 'Ismailia'],'ar' => ['name' => 'اسكندريه'] , 'country_id' => 1, 'status' => true]);
        State::create(['en' => ['name' => 'Aswan'],'ar' => ['name' => 'اسكندريه'] , 'country_id' => 1, 'status' => true]);
        State::create(['en' => ['name' => 'Asyut'],'ar' => ['name' => 'اسكندريه'] , 'country_id' => 1, 'status' => true]);
        State::create(['en' => ['name' => 'Luxor'],'ar' => ['name' => 'اسكندريه'] , 'country_id' => 1, 'status' => true]);
        State::create(['en' => ['name' => 'cairo'],'ar' => ['name' => 'اسكندريه'] , 'country_id' => 1, 'status' => true]);
        State::create(['en' => ['name' => 'Bani Sweif'],'ar' => ['name' => 'اسكندريه'] , 'country_id' => 1, 'status' => true]);
        State::create(['en' => ['name' => 'Port Said'],'ar' => ['name' => 'اسكندريه'] , 'country_id' => 1, 'status' => true]);
        State::create(['en' => ['name' => 'Giza'],'ar' => ['name' => 'اسكندريه'] , 'country_id' => 1, 'status' => true]);
        State::create(['en' => ['name' => 'Damietta'],'ar' => ['name' => 'اسكندريه'] , 'country_id' => 1, 'status' => true]);
        State::create(['en' => ['name' => 'Sharkia'],'ar' => ['name' => 'اسكندريه'] , 'country_id' => 1, 'status' => true]);
    }
}
