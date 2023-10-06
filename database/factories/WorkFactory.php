<?php

namespace Database\Factories;

use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Work>
 */
class WorkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'store_id' => Store::select('id')->inRandomOrder()->get(),
            'day' => fake()->randomElement(['Sat' , 'Sun' , 'Mon' , 'Tue' , 'Wen' , 'Thu' , 'Fri']),
            'working' => fake()->randomNumber([0 , 1]),
            'from' => fake()->time(),
            'to' => fake()->time(),
        ];
    }
}
