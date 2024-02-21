<?php

namespace Database\Factories\Domains\Entities\Models;

use App\Domains\Entities\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdminFactory extends Factory
{
    public $model = Admin::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username' => fake()->name(),
            // 'email' => fake()->unique()->safeEmail(),
            'email' => 'admin@gmail.com',
            'phone_number' => fake()->phoneNumber(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'status' => fake()->randomElement(['active', 'inactive']),
        ];
    }
}
