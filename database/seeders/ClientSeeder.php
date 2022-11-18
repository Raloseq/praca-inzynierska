<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Clients;
use App\Models\ClientAddress;
use Faker\Generator;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        Clients::factory()->times(10)->create()->each(function ($client) {
            $faker = app(Generator::class);
            ClientAddress::factory()->for($client)->create(
                ['client_id' => $faker->unique()->numberBetween(1,10)]
            );
        });
    }
}
