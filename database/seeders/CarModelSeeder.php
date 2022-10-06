<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarModelSeeder extends Seeder
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
            DB::table('model')->insert([
                'name' => $faker->text(6),
                'brand_id' => $faker->numberBetween(1,15),
            ]);
        }
    }
}
