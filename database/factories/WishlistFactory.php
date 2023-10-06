<?php

namespace Database\Factories;

use App\Models\ItemStore;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Wishlist>
 */
class WishlistFactory extends Factory
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
            'item_store_id' => ItemStore::select('id')->inRandomOrder()->get(),

        ];
    }
}
