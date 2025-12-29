<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'date_of_birth' => fake()->date(),
            'customer_kind' => fake()->randomElement(['individual', 'company', 'government']),
            'membership_type' => fake()->randomElement(['standard', 'premium']),
            'is_active' => true,
        ];
    }
}
