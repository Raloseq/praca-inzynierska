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

        DB::table('model')->insert([
            ['name' => 'samochód'],
            ['name' => 'motocykl'],
            ['name' => 'koparka'],
            ['name' => 'dostawczak'],
        ]);
    }
}
