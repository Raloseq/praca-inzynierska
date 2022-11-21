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
        DB::table('model')->insert([
            ['name' => 'HYPERMOTARD 1100 S'],
            ['name' => 'ACADIA'],
            ['name' => 'GTX 500SS'],
            ['name' => 'FLSTCI'],
            ['name' => 'AN400'],
            ['name' => 'S4'],
            ['name' => 'L9500'],
        ]);
    }
}
