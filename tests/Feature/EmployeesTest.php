<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Employee;

class EmployeesTest extends TestCase
{
    use RefreshDatabase;
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

    public function test_employee_create_form_is_rendering_properly()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/employee/create');

        $response->assertStatus(200);
    }

    public function test_user_can_store_employee()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->json('POST','/employee', [
            'name' => 'Jan',
            'surname' => 'Kowalski',
            'phone' => '501928177',
            'position' => 'praktykant',
            'salary' => 3000,
            'user_id' => $user->id
        ]);

        $response->assertStatus(302);
    }

    public function test_user_can_store_employee_when_data_is_invalid()
    {   
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->json('POST','/employee', [
            'name' => 'Jan',
            'surname' => 'Kowalski12',
            'phone' => '501928177',
            'position' => 'junior',
            'salary' => 3000,
            'user_id' => $user->id
        ]);

        $response->assertStatus(422);
    }

    public function test_employee_details_is_rendering_properly()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $employee = Employee::factory()->create();

        $response = $this->get("/employee/$employee->id");

        $response->assertStatus(200);
    }

    public function test_employee_update_form_is_rendering_properly()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $employee = Employee::factory()->create();

        $response = $this->get("/employee/$employee->id/edit");

        $response->assertStatus(200);
    }

    public function test_user_can_edit_employee()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $this->actingAs($user);
        $employee = Employee::factory()->create();

        $response = $this->json('PUT', "/employee/$employee->id", [
            'name' => 'Jan',
            'surname' => 'Kowalski',
            'phone' => '501928177',
            'position' => 'junior',
            'salary' => 3000,
            'user_id' => $user->id
        ]);

        $response->assertStatus(302);
    }

    public function test_user_can_edit_employee_when_data_is_invalid()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $employee = Employee::factory()->create();

        $response = $this->json('PUT', "/employee/$employee->id", [
            'name' => 'Jan',
            'surname' => 'Kowalski12',
            'phone' => '501928177',
            'position' => 'junior',
            'salary' => 3000,
            'user_id' => $user->id
        ]);

        $response->assertStatus(422);
    }

    public function test_user_can_delete_employee()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $employee = Employee::factory()->create();

        $response = $this->json('DELETE', "/employee/$employee->id");

        $response->assertStatus(302);
    }   
}
