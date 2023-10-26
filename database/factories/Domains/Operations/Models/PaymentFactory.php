<?php

namespace Database\Factories\Domains\Operations\Models;

use App\Domains\Operations\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    public $model = Payment::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'amount' => fake()->randomNumber(),
            'payment_method' => fake()->randomElement(['card', 'digital wallet', 'transfer', 'cash']),
            'transaction_data' => fake()->text(),
            'transaction_id' => fake()->randomNumber(),
        ];
    }
}
