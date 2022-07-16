<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Conversation;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ConverstionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Factory::create();

        for ($i = 1; $i <= 10; $i++) {

            // start create user
            $user =  User::create([
                "name" => $faker->name,
                "email" =>$faker->unique()->safeEmail,
                "password" => 12345678,
                "auth_id" => 2,
                'role_name'=> ['company'],
                "status" => 1,
                'phone' => $faker->numberBetween(9000, 1000000),
                "code" => '+2',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $user->complement()->create([
                'nameCompany' => $faker->unique()->name,
                'country_id' => 1,
                'state_id' => rand(1,11),
                'device' => rand(0,1)
            ]);

            $user->company()->create(['location' => $faker->url]);

            $user->media()->create([
                'file_name' => 'img-04.jpg' ,
                'file_size' => 7664,
                'file_type' => 'png/image',
                'file_sort' => 1
            ]);

        }

        for ($i = 1; $i <= 10; $i++) {

            // start create user
            $user = User::create([
                "name" => $faker->name,
                "email" => $faker->unique()->safeEmail,
                "password" => 12345678,
                "auth_id" => 3,
                'role_name' => ['client'],
                "status" => 1,
                'phone' => $faker->numberBetween(9000, 1000000),
                "code" => '+2',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $user->complement()->create([
                'country_id' => 1,
                'state_id' => rand(1, 11),
                'device' => rand(0, 1)
            ]);

            Client::create([
                'user_id' => $user->id
            ]);

            $user->media()->create([
                'file_name' => 'img-04.jpg',
                'file_size' => 7664,
                'file_type' => 'png/image',
                'file_sort' => 1
            ]);
        }

        for ($i = 1; $i <= 10; $i++) {

            // start create user
            $user =  User::create([
                "name" => $faker->name,
                "email" =>$faker->unique()->safeEmail,
                "password" => 12345678,
                "auth_id" => 2,
                'role_name'=> ['design'],
                "status" => 1,
                'phone' => $faker->numberBetween(9000, 1000000),
                "code" => '+2',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $user->complement()->create([
                'country_id' => 1,
                'state_id' => rand(1,11),
                'device' => rand(0,1)
            ]);

            $user->designer()->create([
                'gender' => rand(0,1),
                'birth' => now()->subYears(10)
            ]);

            $user->media()->create([
                'file_name' => 'img-04.jpg' ,
                'file_size' => 7664,
                'file_type' => 'png/image',
                'file_sort' => 1
            ]);

        }



        Conversation::create(['uuid' => Str::uuid()]);
        Conversation::create(['uuid' => Str::uuid()]);
        Conversation::create(['uuid' => Str::uuid()]);
        Conversation::create(['uuid' => Str::uuid()]);
        Conversation::create(['uuid' => Str::uuid()]);
        Conversation::create(['uuid' => Str::uuid()]);
        Conversation::create(['uuid' => Str::uuid()]);
        Conversation::create(['uuid' => Str::uuid()]);
        Conversation::create(['uuid' => Str::uuid()]);
        Conversation::create(['uuid' => Str::uuid()]);
        Conversation::create(['uuid' => Str::uuid()]);
        Conversation::create(['uuid' => Str::uuid()]);
        Conversation::create(['uuid' => Str::uuid()]);
        Conversation::create(['uuid' => Str::uuid()]);
        Conversation::create(['uuid' => Str::uuid()]);
        Conversation::create(['uuid' => Str::uuid()]);
        Conversation::create(['uuid' => Str::uuid()]);
        Conversation::create(['uuid' => Str::uuid()]);
        Conversation::create(['uuid' => Str::uuid()]);
        Conversation::create(['uuid' => Str::uuid()]);


        DB::table('conversation_users')->insert(['conversation_id' => 1, 'user_id' => 2, 'created_at' => now(), 'updated_at' => now(),]);
        DB::table('conversation_users')->insert(['conversation_id' => 1, 'user_id' => 3, 'created_at' => now(), 'updated_at' => now(),]);
        DB::table('conversation_users')->insert(['conversation_id' => 2, 'user_id' => 2, 'created_at' => now(), 'updated_at' => now(),]);
        DB::table('conversation_users')->insert(['conversation_id' => 2, 'user_id' => 4, 'created_at' => now(), 'updated_at' => now(),]);
        DB::table('conversation_users')->insert(['conversation_id' => 3, 'user_id' => 2, 'created_at' => now(), 'updated_at' => now(),]);
        DB::table('conversation_users')->insert(['conversation_id' => 3, 'user_id' => 5, 'created_at' => now(), 'updated_at' => now(),]);
        DB::table('conversation_users')->insert(['conversation_id' => 4, 'user_id' => 2, 'created_at' => now(), 'updated_at' => now(),]);
        DB::table('conversation_users')->insert(['conversation_id' => 4, 'user_id' => 6, 'created_at' => now(), 'updated_at' => now(),]);
        DB::table('conversation_users')->insert(['conversation_id' => 5, 'user_id' => 2, 'created_at' => now(), 'updated_at' => now(),]);
        DB::table('conversation_users')->insert(['conversation_id' => 5, 'user_id' => 7, 'created_at' => now(), 'updated_at' => now(),]);
        DB::table('conversation_users')->insert(['conversation_id' => 6, 'user_id' => 2, 'created_at' => now(), 'updated_at' => now(),]);
        DB::table('conversation_users')->insert(['conversation_id' => 6, 'user_id' => 8, 'created_at' => now(), 'updated_at' => now(),]);
        DB::table('conversation_users')->insert(['conversation_id' => 7, 'user_id' => 2, 'created_at' => now(), 'updated_at' => now(),]);
        DB::table('conversation_users')->insert(['conversation_id' => 7, 'user_id' => 9, 'created_at' => now(), 'updated_at' => now(),]);
        DB::table('conversation_users')->insert(['conversation_id' => 8, 'user_id' => 2, 'created_at' => now(), 'updated_at' => now(),]);
        DB::table('conversation_users')->insert(['conversation_id' => 8, 'user_id' => 10, 'created_at' => now(), 'updated_at' => now(),]);
        DB::table('conversation_users')->insert(['conversation_id' => 9, 'user_id' => 2, 'created_at' => now(), 'updated_at' => now(),]);
        DB::table('conversation_users')->insert(['conversation_id' => 9, 'user_id' => 11, 'created_at' => now(), 'updated_at' => now(),]);
        DB::table('conversation_users')->insert(['conversation_id' => 10, 'user_id' => 2, 'created_at' => now(), 'updated_at' => now(),]);
        DB::table('conversation_users')->insert(['conversation_id' => 10, 'user_id' => 12, 'created_at' => now(), 'updated_at' => now(),]);
        DB::table('conversation_users')->insert(['conversation_id' => 11, 'user_id' => 2, 'created_at' => now(), 'updated_at' => now(),]);
        DB::table('conversation_users')->insert(['conversation_id' => 11, 'user_id' => 13, 'created_at' => now(), 'updated_at' => now(),]);
        DB::table('conversation_users')->insert(['conversation_id' => 12, 'user_id' => 2, 'created_at' => now(), 'updated_at' => now(),]);
        DB::table('conversation_users')->insert(['conversation_id' => 12, 'user_id' => 14, 'created_at' => now(), 'updated_at' => now(),]);
        DB::table('conversation_users')->insert(['conversation_id' => 13, 'user_id' => 2, 'created_at' => now(), 'updated_at' => now(),]);
        DB::table('conversation_users')->insert(['conversation_id' => 13, 'user_id' => 15, 'created_at' => now(), 'updated_at' => now(),]);
        DB::table('conversation_users')->insert(['conversation_id' => 14, 'user_id' => 2, 'created_at' => now(), 'updated_at' => now(),]);
        DB::table('conversation_users')->insert(['conversation_id' => 14, 'user_id' => 16, 'created_at' => now(), 'updated_at' => now(),]);
        DB::table('conversation_users')->insert(['conversation_id' => 15, 'user_id' => 2, 'created_at' => now(), 'updated_at' => now(),]);
        DB::table('conversation_users')->insert(['conversation_id' => 15, 'user_id' => 17, 'created_at' => now(), 'updated_at' => now(),]);
        DB::table('conversation_users')->insert(['conversation_id' => 16, 'user_id' => 2, 'created_at' => now(), 'updated_at' => now(),]);
        DB::table('conversation_users')->insert(['conversation_id' => 16, 'user_id' => 18, 'created_at' => now(), 'updated_at' => now(),]);
        DB::table('conversation_users')->insert(['conversation_id' => 17, 'user_id' => 2, 'created_at' => now(), 'updated_at' => now(),]);
        DB::table('conversation_users')->insert(['conversation_id' => 17, 'user_id' => 19, 'created_at' => now(), 'updated_at' => now(),]);
        DB::table('conversation_users')->insert(['conversation_id' => 18, 'user_id' => 2, 'created_at' => now(), 'updated_at' => now(),]);
        DB::table('conversation_users')->insert(['conversation_id' => 18, 'user_id' => 20, 'created_at' => now(), 'updated_at' => now(),]);
        DB::table('conversation_users')->insert(['conversation_id' => 19, 'user_id' => 2, 'created_at' => now(), 'updated_at' => now(),]);
        DB::table('conversation_users')->insert(['conversation_id' => 19, 'user_id' => 21, 'created_at' => now(), 'updated_at' => now(),]);
        DB::table('conversation_users')->insert(['conversation_id' => 20, 'user_id' => 2, 'created_at' => now(), 'updated_at' => now(),]);
        DB::table('conversation_users')->insert(['conversation_id' => 20, 'user_id' => 22, 'created_at' => now(), 'updated_at' => now(),]);

    }
}
