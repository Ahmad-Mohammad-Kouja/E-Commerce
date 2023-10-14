<?php

namespace Database\Factories\Domains\Operations\Models;

use App\Domains\Operations\Models\Order;
use App\Domains\Operations\Models\OrderDetail;
use App\Domains\Products\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderDetailFactory extends Factory
{
    public $model = OrderDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' =>  Order::factory(),
            'item_id' => Item::factory(),
            'quantity' => fake()->randomNumber(1, 100),
            'price' => fake()->randomNumber(),
        ];
    }
}
