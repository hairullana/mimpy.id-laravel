<?php

namespace Database\Factories;

use App\Models\Job;
use App\Models\Applicant;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'applicant_id' => Applicant::all()->random()->id,
            'job_id' => Job::all()->random()->id,
            'salary' => mt_rand(1,10) * 1000000,
            'applicant_letter' => $this->faker->sentence(30),
            'status' => mt_rand(-1,1),
            'confirm' => mt_rand(0,1),
            'company_letter' => $this->faker->sentence(30)
        ];
    }
}
