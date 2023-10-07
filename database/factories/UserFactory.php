<?php

namespace Database\Factories;

use Carbon\Carbon;
use Faker\Provider\id_ID\Address;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_firstName' => fake('id_ID')->firstName(),
            'user_lastName' => fake('id_ID')->lastName(),
            'user_email' => fake('id_ID')->unique()->safeEmail(),
            'user_born' => fake('id_ID')->date('d-m-Y'),
            'user_address' => fake('id_ID')->address(),
            'user_city' => fake('id_ID')->city(),
            'user_state' => Address::state(),
            'email_verified_at' => now(),
            'user_password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'created_at' => Carbon::now()
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
