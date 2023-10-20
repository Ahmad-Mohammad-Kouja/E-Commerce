<?php

namespace Database\Factories\Domains\Stores\Models;

use App\Domains\Stores\Models\Work;
use Illuminate\Database\Eloquent\Factories\Factory;

class WorkFactory extends Factory
{
    public $model = Work::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'day' => fake()->randomElement(['Sat', 'Sun', 'Mon', 'Tue', 'Wen', 'Thu', 'Fri']),
            'working' => fake()->randomNumber([0, 1]),
            'from' => fake()->time(),
            'to' => fake()->time(),
        ];
    }
}
