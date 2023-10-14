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
     *
     * @throws \Exception
     */
    public function definition(): array
    {
        $categoryId = null;

        $flag = random_int(0, 1);

        if (Category::count() && $flag) {
            $categoryId = Category::all()->unique()->random()->id;
        }

        return [
            'parent_id' => $categoryId,
            'name' => fake()->name(),
            'description' => fake()->text(),
            'image' => fake()->image(),
            'status' => fake()->randomElement(['archived', 'active']),
        ];
    }
}
