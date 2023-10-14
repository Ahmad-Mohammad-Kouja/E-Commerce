<?php

namespace Database\Factories\Domains\Stores\Models;

use App\Domains\Stores\Models\ContactInfo;
use App\Domains\Stores\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactInfoFactory extends Factory
{
    public $model = ContactInfo::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'store_id' => Store::factory(),
            'platform' => fake()->name(),
            'contact' => fake()->word(),
        ];
    }
}
