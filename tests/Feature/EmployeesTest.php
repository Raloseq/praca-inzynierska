<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class EmployeesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_employee_index_is_rendering_properly()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/employee');

        $response->assertStatus(200);
    }

    public function test_user_can_store_employee()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/employee', [
            'name' => 'Jan',
            'surname' => 'Kowalski',
            'phone' => '501928177',
            'position' => 'junior',
            'salary' => 3000,
            'user_id' => $user->id
        ]);

        $response->assertStatus(302);
    }
}
