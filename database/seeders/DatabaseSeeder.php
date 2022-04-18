<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {

        $this->call(PermissionTableSeeder::class);
        $this->call(CreateAdminUserSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(StateSeeder::class);
        $this->call(AdvertisePageSeeder::class);
        $this->call(AdvertiseViewSeeder::class);
        $this->call(AdvertisePageMobileSeeder::class);
        $this->call(ExtentionImagesSeeder::class);
        $this->call(AdvertisePackageSeeder::class);
        $this->call(DaySeeder::class);


    }
}
