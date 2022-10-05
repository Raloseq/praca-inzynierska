<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        
        for($i = 0; $i < 15; $i++) {
            DB::table('client_addresses')->insert([
                'voivodeship' => $faker->word(),
                'city' => $faker->word(),
                'street' => $faker->word(),
                'ZIP' => $faker->numerify('##-###'),
                'client_id' => $faker->numberBetween(1,14)
            ]);
        }
    }
}
