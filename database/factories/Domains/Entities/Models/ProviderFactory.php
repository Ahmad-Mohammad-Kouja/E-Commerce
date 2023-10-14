<?php

namespace Database\Factories\Domains\Entities\Models;

use App\Domains\Entities\Models\Provider;
use App\Domains\Entities\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProviderFactory extends Factory
{
    public $model = Provider::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'provider' => fake()->name(),
            'user_id' => User::factory(),
            'provider_id' => fake()->uuid(),
            'provider_token' => Str::random(10),
        ];
    }
}
