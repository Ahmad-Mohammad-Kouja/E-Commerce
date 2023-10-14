<?php

namespace Database\Factories\Domains\Products\Models;

use App\Domains\Products\Models\Item;
use App\Domains\Products\Models\ItemStore;
use App\Domains\Stores\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemStoreFactory extends Factory
{
    public $model = ItemStore::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'item_id' => Item::factory(),
            'store_id' => Store::factory(),
            'price' => fake()->randomNumber(),
        ];
    }
}
