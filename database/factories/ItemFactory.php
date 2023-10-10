<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => Category::factory()->create()->id,
            'name' => fake()->name(),
            'description' => fake()->text(),
            'image' => fake()->image(),
            'weight' => fake()->randomFloat(0.1 , 10000),
            'quantity' => fake()->randomNumber(),
            'status' => fake()->randomElement(['archived' , 'active']),
        ];
    }
}
