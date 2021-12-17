<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company_id' => mt_rand(1,5),
            'position' => $this->faker->jobTitle(),
            'education_id' => mt_rand(1,4),
            'jobdesk' => $this->faker->sentence(10),
            'description' => $this->faker->sentence(30),
            'status' => mt_rand(0,1)
        ];
    }
}
