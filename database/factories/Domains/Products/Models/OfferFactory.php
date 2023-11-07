<?php

namespace Database\Factories\Domains\Products\Models;

use App\Domains\Products\Models\Item;
use App\Domains\Products\Models\Offer;
use Illuminate\Database\Eloquent\Factories\Factory;

class OfferFactory extends Factory
{
    public $model = Offer::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'item_id' => Item::factory(),
            'start_date' => fake()->time(),
            'end_date' => fake()->time(),
            'type' => fake()->randomElement(['percent', 'fixed']),
            'value' => fake()->randomFloat(),
        ];
    }
}
