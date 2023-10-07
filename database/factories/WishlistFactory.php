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
            'user_id' => User::take(User::count())->get()->random()->id,
            'item_store_id' => ItemStore::take(ItemStore::count())->get()->random()->id,

        ];
    }
}
