<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Car;
use App\Models\Employee;
use App\Models\Clients;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ServiceOrders>
 */
class ServiceOrdersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'admission_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'is_done' => $this->faker->numberBetween(0,1),
            'description' => $this->faker->word(3),
            'price' => $this->faker->numberBetween(100,201),
            'car_id' => 2,
            'employee_id' => 2,
            'client_id' => 2,
            'user_id' => 1
        ];
    }
}
