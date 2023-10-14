<?php

namespace Database\Factories\Domains\Operations\Models;

use App\Domains\Entities\Models\User;
use App\Domains\Operations\Models\Cart;
use App\Domains\Products\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class CartFactory extends Factory
{
    public $model = Cart::class;

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
            'quantity' => fake()->randomNumber(),
        ];
    }
}
