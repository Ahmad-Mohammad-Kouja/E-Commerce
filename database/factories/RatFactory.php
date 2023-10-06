<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rat>
 */
class RatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::select('id')->inRandomOrder()->get(),
            'item_id' => Item::select('id')->inRandomOrder()->get(),
            'content' => fake()->text(),
            'rating' => fake()->randomNumber([1 , 2 , 3 , 4 , 5]),
        ];
    }
}
