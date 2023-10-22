<?php

namespace Database\Factories\Domains\Stores\Models;

use App\Domains\Stores\Models\Ad;
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
            'description' => fake()->text(),
            'image' => fake()->image(),
            'start_date' => fake()->time(),
            'end_date' => fake()->time(),
        ];
    }
}
