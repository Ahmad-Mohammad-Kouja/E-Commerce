<?php

namespace Database\Factories;

use App\Domains\Entities\Models\User;
use App\Domains\Locations\Models\Region;
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
            'user_id' => User::factory(),
            'region_id' => Region::factory(),
            'name' => fake()->address(),
            'street' => fake()->streetAddress(),
            'building_number' => fake()->buildingNumber(),
            'apartment_number' => fake()->randomNumber(),
        ];
    }
}
