<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Offer>
 */
class OfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'item_id' => Item::take(Item::count())->get()->random()->id,
            'start_date' => fake()->time(),
            'end_date' => fake()->time(),
            'type' => fake()->randomElement(['percent' , 'fixed']),
            'value' => fake()->randomFloat(),
        ];
    }
}
