<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\ClientAddress;
use App\Models\Clients;

class ClientAddressTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_client_address_create_form_is_rendering_properly()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/client_address/create');

        $response->assertStatus(200);
    }

    public function test_user_can_store_client_address()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $this->actingAs($user);
        $client = Clients::factory()->create();

        $response = $this->json('POST','/client_address', [
            'voivodeship' => 'opolskie',
            'city' => 'Bogatynia',
            'street' => 'Francuska',
            'ZIP' => '07498',
            'client_id' => $client->id,
        ]);

        $response->assertStatus(302);
    }

    public function test_user_can_store_client_address_when_data_is_invalid()
    {   
        $user = User::factory()->create();
        $this->actingAs($user);
        $client = Clients::factory()->create();

        $response = $this->json('POST','/client_address', [
            'voivodeship' => 'opolskie',
            'city' => 'Bogatynia',
            'street' => 'Francuska',
            'ZIP' => '07498123123',
            'client_id' => $client->id,
        ]);

        $response->assertStatus(422);
    }

    // public function test_user_can_edit_client_address()
    // {
    //     $this->withoutExceptionHandling();

    //     $user = User::factory()->create();
    //     $this->actingAs($user);
    //     $client = Clients::factory()->create();
    //     $address = ClientAddress::factory()->create();
        
    //     $response = $this->put("/client_address/$address->id/edit", [
    //         'voivodeship' => 'lubelskie',
    //         'city' => 'Bogatynia',
    //         'street' => 'Francuska',
    //         'ZIP' => '07498',
    //         'client_id' => $client->id,
    //     ]);

    //     $response->assertStatus(302);
    // }

    // public function test_user_can_edit_client_address_when_data_is_invalid()
    // {
    //     $user = User::factory()->create();
    //     $this->actingAs($user);
    //     $address = ClientAddress::factory()->create();
    //     $client = Clients::factory()->create();

    //     $response = $this->json('PUT', "/client_address/$address->id/edit", [
    //         'voivodeship' => 'lubelskie',
    //         'city' => 'Bogatynia',
    //         'street' => 'Francuska',
    //         'ZIP' => '074982',
    //         'client_id' => $client->id,
    //     ]);

    //     $response->assertStatus(422);
    // }

    public function test_user_can_delete_client_address()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $address = ClientAddress::factory()->create();
        
        $response = $this->json('DELETE', "/client_address/$address->id");

        $response->assertStatus(302);
    }
}
