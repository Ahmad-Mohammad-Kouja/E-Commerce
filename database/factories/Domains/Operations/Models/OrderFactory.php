<?php

namespace Database\Factories\Domains\Operations\Models;

use App\Domains\Entities\Models\User;
use App\Domains\Locations\Models\Address;
use App\Domains\Operations\Models\Order;
use App\Domains\Operations\Models\Payment;
use App\Domains\Stores\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    public $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'store_id' => Store::factory(),
            'address_id' => Address::factory(),
            'order_status' => fake()->randomElement(['in-progress', 'delivered']),
            'payment_id' => Payment::factory(),
            'delivery_type' => fake()->randomElement(['delivery', 'pickup']),
            'time_delivery' => fake()->time(),
            'current_location' => fake()->longitude().','.fake()->latitude(),
        ];
    }
}
