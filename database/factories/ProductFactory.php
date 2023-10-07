<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::take(User::count())->get()->random()->id,
            'name' => fake()->name(),
            'description' => fake()->realText(),
            'price' => fake()->randomFloat(),
            'image' => fake()->image()
        ];
    }
}