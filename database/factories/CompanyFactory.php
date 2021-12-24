<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'email' => $this->faker->email(),
            'phone' => $this->faker->phoneNumber(),
            'city' => $this->faker->city(),
            'address' => $this->faker->address(),
            'description' => $this->faker->sentence(20),
            'photo' => 'images/company/default.jpg',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi' // password
        ];
    }
}
