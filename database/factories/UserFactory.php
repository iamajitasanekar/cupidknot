<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->firstName(),
            'email' => $this->faker->email(),
            'password' => Hash::make($this->faker->numerify('password')),
            'dob' => $this->faker->dateTimeBetween('1997-01-01', '2000-12-31')->format('Y/m/d'),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'annual_income' => $this->faker->numberBetween(500000,5000000),
            'occupation' => $this->faker->randomElement(['private job', 'government job','business']),
            'family_type' => $this->faker->randomElement(['joint family', 'nuclear family']),
            'manglik' => $this->faker->randomElement(['yes', 'no']),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
