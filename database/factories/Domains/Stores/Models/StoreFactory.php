<?php

namespace Database\Factories\Domains\Stores\Models;

use App\Domains\Locations\Models\City;
use App\Domains\Stores\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

class StoreFactory extends Factory
{
    public $model = Store::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'city_id' => City::factory(),
        ];
    }
}
