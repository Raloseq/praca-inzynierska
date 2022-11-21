<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Clients;

class ClientTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_clients_index_is_rendering_properly()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/clients');

        $response->assertStatus(200);
    }

    public function test_clients_create_form_is_rendering_properly()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/clients/create');

        $response->assertStatus(200);
    }

    public function test_user_can_store_clients()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->json('POST','/clients', [
            'name' => 'Jan',
            'surname' => 'Kowalski',
            'NIP' => '1325123456',
            'company_name' => 'Firma A',
            'phone' => '123456789',
            'email' => 'test@example.com',
            'user_id' => $user->id
        ]);

        $response->assertStatus(302);
    }

    public function test_user_can_store_clients_when_data_is_invalid()
    {   
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->json('POST','/clients', [
            'name' => 'Jan',
            'surname' => 'Kowalski',
            'NIP' => '501928177121',
            'company_name' => 'Firma A',
            'phone' => '123456789',
            'email' => 'test@example.com',
            'user_id' => $user->id
        ]);

        $response->assertStatus(422);
    }

    public function test_clients_details_is_rendering_properly()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $client = Clients::factory()->create();

        $response = $this->get("/clients/$client->id");

        $response->assertStatus(200);
    }

    public function test_clients_update_form_is_rendering_properly()
    {
        $this->withoutExceptionHandling();
        
        $user = User::factory()->create();
        $this->actingAs($user);
        $client = Clients::factory()->create();

        $response = $this->get("/clients/$client->id/edit");

        $response->assertStatus(200);
    }

    public function test_user_can_edit_clients()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $this->actingAs($user);
        $client = Clients::factory()->create();

        $response = $this->json('PUT', "/clients/$client->id", [
            'name' => 'Rafal',
            'surname' => 'Kowalski',
            'NIP' => '5019281771',
            'company_name' => 'Firma A',
            'phone' => '123456789',
            'email' => 'test@example.com',
            'user_id' => $user->id
        ]);

        $response->assertStatus(302);
    }

    public function test_user_can_edit_clients_when_data_is_invalid()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $client = Clients::factory()->create();

        $response = $this->json('PUT', "/clients/$client->id", [
            'name' => 'Jan',
            'surname' => 'Kowalski',
            'NIP' => '50192817712',
            'company_name' => 'Firma A',
            'phone' => 'abc',
            'email' => 'test@example.com',
            'user_id' => $user->id
        ]);

        $response->assertStatus(422);
    }

    public function test_user_can_delete_clients()
    {
        $this->withoutExceptionHandling();
        
        $user = User::factory()->create();
        $this->actingAs($user);
        $client = Clients::factory()->create();

        $response = $this->json('DELETE', "/clients/$client->id");

        $response->assertStatus(302);
    }
}
