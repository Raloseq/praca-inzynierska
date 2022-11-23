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
}
