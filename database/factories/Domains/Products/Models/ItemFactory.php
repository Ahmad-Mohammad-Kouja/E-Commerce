<?php

namespace Database\Factories\Domains\Products\Models;

use App\Domains\Products\Models\Category;
use App\Domains\Products\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    public $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => Category::factory()->create(),
            'name' => fake()->name(),
            'description' => fake()->text(),
            'image' => fake()->image(),
            'weight' => fake()->randomFloat(0.1, 10000),
            'quantity' => fake()->randomNumber(),
            'status' => fake()->randomElement(['archived', 'active']),
        ];
    }
}
