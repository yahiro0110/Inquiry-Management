<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fullname' => $this->faker->name,
            'gender' => $this->faker->numberBetween(1, 2),
            'email' => $this->faker->safeEmail,
            'postal' => $this->faker->numberBetween(100, 999) . '-' . $this->faker->numberBetween(1000, 9999),
            'address' => $this->faker->prefecture . $this->faker->city . $this->faker->streetAddress,
            'building_name' => $this->faker->secondaryAddress,
            'opinion' => $this->faker->realText($this->faker->numberBetween(10, 120)),
            'created_at' => $this->faker->dateTimeBetween('-12 week', '+12 week')
        ];
    }
}
