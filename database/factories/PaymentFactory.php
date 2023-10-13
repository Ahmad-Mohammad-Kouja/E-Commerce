<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'amount' => fake()->randomNumber(),
            'payment_method' => fake()->randomElement(['card' , 'digital wallet' , 'transfer' , 'cash']),
            'transaction_data' => fake()->text(),
            'transaction_id' => fake()->randomNumber(),
        ];
    }
}
