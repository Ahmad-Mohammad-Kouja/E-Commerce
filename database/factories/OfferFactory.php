<?php

namespace Database\Factories;

use App\Models\Offer;
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
            'item_id' => Offer::factory()->create()->id,
            'start_date' => fake()->time(),
            'end_date' => fake()->time(),
            'type' => fake()->randomElement(['percent', 'fixed']),
            'value' => fake()->randomFloat(),
        ];
    }
}
