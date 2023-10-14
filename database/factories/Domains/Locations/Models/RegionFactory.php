<?php

namespace Database\Factories\Domains\Locations\Models;

use App\Domains\Locations\Models\City;
use App\Domains\Locations\Models\Region;
use Illuminate\Database\Eloquent\Factories\Factory;

class RegionFactory extends Factory
{
    public $model = Region::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'city_id' => City::factory(),
            'name' => fake()->country(),
            'delivery_fee' => fake()->numberBetween(2, 100),
        ];
    }
}
