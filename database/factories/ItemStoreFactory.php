<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\Store;
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
        return [
            'item_id' => Item::select('id')->inRandomOrder()->get(),
            'store_id' => Store::select('id')->inRandomOrder()->get(),
            'price' => fake()->randomNumber(),
        ];
    }
}
