<?php

namespace Database\Factories\Domains\Locations\Models;

use App\Domains\Entities\Models\User;
use App\Domains\Locations\Models\Address;
use App\Domains\Locations\Models\Region;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    public $model = Address::class;

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
