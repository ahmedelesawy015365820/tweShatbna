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
        $this->call(AdvertiseViewSeeder::class);
        $this->call(AdvertisePageSeeder::class);
        $this->call(AdvertisePageMobileSeeder::class);
        $this->call(ExtentionImagesSeeder::class);
        $this->call(AdvertisePackageSeeder::class);
        $this->call(DaySeeder::class);
        $this->call(DesignServiceSeeder::class);
        $this->call(DegreeDesignSeeder::class);
        $this->call(CompanyServiceSeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(JobSeeder::class);

    }
}
