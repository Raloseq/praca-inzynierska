<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
       
        for($i = 0; $i < 20; $i++) {
            DB::table('cars')->insert([
                'user_id' => $faker->numberBetween(1,3),
                'type' => $faker->word(),
                'model' => $faker->word(),
                'brand' => $faker->word(),
                'VIN' => $faker->asciify('*****************'),
                'registration_number' => $faker->asciify('******'),
                'year' => $faker->date(),
            ]);
        }
    }
}
