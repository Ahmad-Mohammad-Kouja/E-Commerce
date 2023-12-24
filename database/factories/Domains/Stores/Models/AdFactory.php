<?php

namespace Database\Factories\Domains\Stores\Models;

use App\Domains\Stores\Models\Ad;
use App\Domains\Stores\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdFactory extends Factory
{
    public $model = Ad::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->title(),
            'store_id' => Store::factory(),
            'description' => fake()->text(),
            'image' => fake()->image(),
            'start_date' => fake()->date(),
            'end_date' => fake()->date(),
        ];
    }
}
