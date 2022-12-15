<?php

namespace Database\Seeders;

 use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Ramsey\Uuid\Generator\RandomGeneratorFactory;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();

        foreach (range(1,1000) as $index)
        {
            DB::table('posts')->insert([
                'title'=>$faker->sentence(5),
                'body'=>$faker->paragraph(4),
                'user_id'=>$faker->numberBetween(1,2)
            ]);
        }


    }
}
