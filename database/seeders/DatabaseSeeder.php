<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\Admin;
use App\Models\Company;
use App\Models\Applicant;
use App\Models\Application;
use App\Models\Education;
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
        Education::create(['name' => 'No education']);
        Education::create(['name' => 'Elementary school']);
        Education::create(['name' => 'Junior high school']);
        Education::create(['name' => 'Senior high school']);
        Education::create(['name' => 'Diploma']);
        Education::create(['name' => 'Bachelor degree']);
        Education::create(['name' => 'Master degree']);
        Education::create(['name' => 'Doctorate']);
        
        Company::factory(5)->create();
        Job::factory(10)->create();
        Applicant::factory(5)->create();
        Application::factory(20)->create();
        Admin::factory(1)->create();

        // Company::truncate();
        // Job::truncate();
        // Applicant::truncate();
        // Application::truncate();
        // Admin::truncate();

        // Company::factory()
        //     ->has(Job::factory()->count(5), 'job')
        //     ->count(10)
        //     ->create();

        // Applicant::factory()
        //     ->has(Application::factory()->count(5), 'application')
        //     ->count(10)
        //     ->create();

    }
}
