<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Employee;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Employee::class;

    public function definition()
    {
        return [
            'name' => $this->faker->firstName(),
            'surname' => $this->faker->lastName(),
            'phone' => $this->faker->numerify('#########'),
            'salary' => $this->faker->numberBetween(2000,3500),
            'position' => $this->faker->randomElement(['junior','mid','sernior']),
            'user_id' => User::all()->random()->id,
        ];
    }
}
