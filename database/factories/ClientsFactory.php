<?php

namespace Database\Factories;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Clients>
 */
class ClientsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    { 
        return [
            'name' => $this->faker->firstName(),
            'surname' => $this->faker->lastName(),
            'NIP' => $this->faker->numerify('##########'),
            'company_name' => $this->faker->company(),
            'phone' => $this->faker->unique()->numerify('#########'),
            'email' => $this->faker->unique()->safeEmail(),
            'user_id' => User::all()->random()->id,
        ];
    }
}
