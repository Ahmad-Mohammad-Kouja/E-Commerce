<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\Store;
use App\Models\Work;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ItemStore>
 */
class ItemStoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $item = Item::factory()->create();
        $store = Store::factory()->create();
        Work::factory()->create(['store_id' => $item->id]);
        return [
            'item_id' => $item->id,
            'store_id' => $store->id,
            'price' => fake()->randomNumber(),
        ];
    }
}
