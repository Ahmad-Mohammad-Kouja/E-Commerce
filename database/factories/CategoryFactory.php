<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'parent_id' => Category::select('id')->inRandomOrder()->get(),
            'name' => fake()->name(),
            'description' => fake()->text(),
            'image' => fake()->image(),
            'status' => fake()->randomElement(['archived' , 'active']),
        ];
    }
}
