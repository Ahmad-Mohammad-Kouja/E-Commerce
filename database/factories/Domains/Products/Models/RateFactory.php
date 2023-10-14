<?php

namespace Database\Factories\Domains\Products\Models;

use App\Domains\Entities\Models\User;
use App\Domains\Products\Models\Item;
use App\Domains\Products\Models\Rate;
use Illuminate\Database\Eloquent\Factories\Factory;


class RateFactory extends Factory
{
    public $model = Rate::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'item_id' => Item::factory(),
            'content' => fake()->text(),
            'rating' => fake()->randomNumber([1, 2, 3, 4, 5]),
        ];
    }
}
