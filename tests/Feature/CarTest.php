<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Car;


class CarTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_car_index_is_rendering_properly()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/cars');

        $response->assertStatus(200);
    }

    public function test_car_create_form_is_rendering_properly()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/cars/create');

        $response->assertStatus(200);
    }

    public function test_user_can_store_car()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->json('POST','/cars', [
            'VIN' => '15276123567812345',
            'registration_number' => 'WMA123',
            'year' => '1986-05-12',
            'photo' => \Illuminate\Http\UploadedFile::fake()->create('test.png', $kilobytes = 0),
            'type' => 'koparka',
            'model' => 'JBC',
            'user_id' => $user->id
        ]);

        $response->assertStatus(302);
    }

    public function test_user_can_store_car_when_data_is_invalid()
    {   
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->json('POST','/cars', [
            'VIN' => '15276123567812345123',
            'registration_number' => 'WMA123',
            'year' => '12.12.1999',
            'photo' => \Illuminate\Http\UploadedFile::fake()->create('test.png', $kilobytes = 0),
            'type' => 'koparka',
            'model' => 'JBC',
            'user_id' => $user->id
        ]);

        $response->assertStatus(422);
    }

    public function test_car_details_is_rendering_properly()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $car = Car::factory()->create();

        $response = $this->get("/cars/$car->id");

        $response->assertStatus(200);
    }

    public function test_car_update_form_is_rendering_properly()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $car = Car::factory()->create();
 
        $response = $this->get("/cars/$car->id/edit");

        $response->assertStatus(200);
    }

    public function test_user_can_edit_car()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $this->actingAs($user);
        $car = Car::factory()->create();
        
        $response = $this->json('PUT', "/cars/$car->id", [
            'VIN' => '15276123567812345',
            'registration_number' => 'WMA124',
            'year' => '1999-12-12',
            'photo' => \Illuminate\Http\UploadedFile::fake()->create('test.png', $kilobytes = 0),
            'type' => 'koparka',
            'model' => 'JBC',
            'user_id' => $user->id
        ]);

        $response->assertStatus(302);
    }

    public function test_user_can_edit_car_when_data_is_invalid()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $car = Car::factory()->create();

        $response = $this->json('PUT', "/cars/$car->id", [
            'VIN' => '15276123567812345123',
            'registration_number' => 'WMA123',
            'year' => '12.12.1999',
            'photo' => \Illuminate\Http\UploadedFile::fake()->create('test.png', $kilobytes = 0),
            'type' => 'koparka',
            'model' => 'JBC',
            'user_id' => $user->id
        ]);

        $response->assertStatus(422);
    }

    public function test_user_can_delete_car()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $car = Car::factory()->create();
        
        $response = $this->json('DELETE', "/cars/$car->id");

        $response->assertStatus(302);
    }
}
