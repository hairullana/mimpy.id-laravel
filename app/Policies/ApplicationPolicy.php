<?php

namespace App\Policies;

use App\Models\Company;
use App\Models\Application;
use Illuminate\Auth\Access\HandlesAuthorization;

class ApplicationPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function acceptReject(Company $company, Application $application){
        return $company->id == $application->job->company_id;
    }
}
