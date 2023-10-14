<?php

namespace Database\Factories\Domains\Products\Models;

use App\Domains\Entities\Models\User;
use App\Domains\Products\Models\ItemStore;
use App\Domains\Products\Models\Wishlist;
use Illuminate\Database\Eloquent\Factories\Factory;

class WishlistFactory extends Factory
{
    public $model = Wishlist::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'item_store_id' => ItemStore::factory(),

        ];
    }
}
