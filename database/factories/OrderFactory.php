<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Payment;
use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $payment = Payment::factory()->create();

        return [
            'user_id' => User::factory()->create()->id,
            'store_id' => Store::factory()->create()->id,
            'address_id' => Address::factory()->create()->id,
            'order_status' => fake()->randomElement(['in-progress' , 'delivered']),
            'payment_id' => $payment->id,
            'delivery_type' => fake()->randomElement(['delivery' , 'pickup']),
            'time_delivery' => fake()->time(),
            'current_location' => fake()->longitude() . ',' . fake()->latitude(),
        ];
    }
}
