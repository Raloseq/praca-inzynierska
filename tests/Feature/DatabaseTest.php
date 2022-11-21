<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Employee;
use App\Models\Clients;
use App\Models\Car;

class DatabaseTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_model_user_can_be_instantiated()
    {
        $user = User::factory()->create();
        $this->assertDatabaseCount('users', 1);
        $this->assertModelExists($user);
    }

    // public function test_model_car_can_be_instantiated()
    // {
    //     $car = Car::factory()->create();
    //     dd($car);
    //     $this->assertModelExists($car);
        
    // }

    // public function test_model_client_can_be_instantiated()
    // {
    //     $client = Clients::factory()->create();
    //     $this->assertDatabaseCount('clients', 1);
        
        
    // }

    // public function test_model_employee_can_be_instantiated()
    // {
    //     $employee = Employee::factory()->create();
    //     $this->assertDatabaseCount('emplyoee', 1);
        
        
    // }
    
        
        
}
