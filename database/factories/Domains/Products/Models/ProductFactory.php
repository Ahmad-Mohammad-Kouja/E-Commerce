<?php

namespace Database\Factories\Domains\Products\Models;

use App\Domains\Entities\Models\User;
use App\Domains\Products\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(1)->create(),
            'name' => fake()->name(),
            'description' => fake()->realText(),
            'price' => fake()->randomFloat(),
            'image' => fake()->image(),
        ];
    }
}
