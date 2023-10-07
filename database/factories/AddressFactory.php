<?php

namespace Database\Factories;

use App\Models\Region;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "user_id" => User::factory()->create()->id,
            'region_id' => Region::factory()->create()->id,
            'name' => fake()->address(),
            'street' => fake()->streetAddress(),
            'building_number' => fake()->buildingNumber(),
            'apartment_number' => fake()->randomNumber(),
        ];
    }
}
