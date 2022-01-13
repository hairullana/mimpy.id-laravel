<?php

namespace App\Policies;

use App\Models\Company;
use App\Models\Job;
use Illuminate\Auth\Access\HandlesAuthorization;

class JobPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function edit(Company $company, Job $job)
    {
        return $company->id == $job->company_id;
    }

    public function close(Company $company, Job $job){
        return $company->id == $job->company_id;
    }
}
