<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $faker = \Faker\Factory::create();
        for($i = 0; $i < 10; $i++) {
            DB::table('employee')->insert([
                'name' => $faker->name(),
                'surname' => $faker->name(),
                'phone' => $faker->numerify('###-###-###'),
                'salary' => $faker->numberBetween(2000,3500),
                'position' => $faker->randomElement(['junior','mid','sernior'])
            ]);
        }
    }
}
