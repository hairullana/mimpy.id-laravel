<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\Company;
use App\Models\Applicant;
use App\Models\Application;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Company::factory(5)->create();
        Job::factory(10)->create();
        Applicant::factory(5)->create();
        Application::factory(20)->create();
    }
}
