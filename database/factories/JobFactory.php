<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Education;
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
        // $education = Education::pluck('id')->toArray();
        return [
            'company_id' => Company::all()->random()->id,
            'education_id' => Education::all()->random()->id,
            'position' => $this->faker->jobTitle(),
            'jobdesk' => $this->faker->sentence(10),
            'description' => $this->faker->sentence(30),
            'status' => mt_rand(0,1)
        ];
    }
}
