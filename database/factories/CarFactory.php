<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Type;
use App\Models\CarModel;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'type' => Type::all()->random()->name,
            'model' => CarModel::all()->random()->name,
            'VIN' => $this->faker->bothify('#################'),
            'registration_number' => $this->faker->bothify('#######'),
            'year' => $this->faker->date(),
        ];
    }
}
