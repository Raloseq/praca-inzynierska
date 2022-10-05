<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
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
            DB::table('clients')->insert([
                'name' => $faker->name(),
                'surname' => $faker->name(),
                'phone' => $faker->numerify('#########'),
                'email' => $faker->email(),
                'NIP' => $faker->numerify('##########'),
                'company_name' => $faker->text(7),
                'user_id' => $faker->numberBetween(1,3)
            ]);
        }
    }
}
