<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderDetail>
 */
class OrderDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $order = Order::factory()->create();
        return [
            'order_id' => $order->id,
            'item_id' => Item::factory()->create()->id,
            'quantity' => fake()->randomNumber(1 , 100),
            'price' => fake()->randomNumber(),
        ];
    }
}
