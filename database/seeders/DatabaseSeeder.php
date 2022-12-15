<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();

        foreach (range(1,1000) as $index)
        {
             DB::table('users')->insert([
                'name'=>$faker->name,
                'email'=>$faker->email,
                'phone'=>$faker->buildingNumber,
                'password'=>bcrypt('secret')

            ]);
            /*
            Student::insert([
                'name'=>$faker->name,
                'email'=>$faker->email,
                'phone'=>$faker->buildingNumber,

            ]);
            */
        }


        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
       /*  $this->call([
            PostTableSeeder::class
        ]); */

    }
}
