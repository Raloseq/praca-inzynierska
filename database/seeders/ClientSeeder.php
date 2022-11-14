<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Clients;
use App\Models\ClientAddress;

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
            ClientAddress::factory()->for($client)->create();
        });

        // factory(App\Clients::class, 10)->create()->each(function ($client) {
        //     $address = factory(App\ClientAddress::class)->make();
        //     $client->address()->save($address);
        // });
    }
}
