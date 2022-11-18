<?php

namespace Database\Factories;

use App\Models\Clients;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ClientAddress>
 */
class ClientAddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'voivodeship' => $this->faker->randomElement(['pomorskie', 'zachodniopomorskie', 'podlaskie', 'mazowieckie', 'wielkopolskie', 'lubelskie', 'opolskie', 'podkarpackie']),
            'city' => $this->faker->city(),
            'street' => $this->faker->streetName(),
            'ZIP' => $this->faker->postcode(),
        ];
    }
}
