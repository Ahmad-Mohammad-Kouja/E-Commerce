<?php

namespace Database\Factories\Domains\Products\Models;

use App\Domains\Products\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    public $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     *
     * @throws \Exception
     */
    public function definition(): array
    {
        return [
            'parent_id' => Category::factory(),
            'name' => fake()->name(),
            'description' => fake()->text(),
            'image' => fake()->image(),
            'status' => fake()->randomElement(['archived', 'active']),
        ];
    }
}
