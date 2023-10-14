<?php

namespace Database\Factories\Domains\Stores\Models;

use App\Domains\Entities\Models\User;
use App\Domains\Stores\Models\Feedback;
use App\Domains\Stores\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

class FeedbackFactory extends Factory
{
    public $model = Feedback::class;

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
            'message' => fake()->text(),
        ];
    }
}
