<?php

namespace App\Policies;

use App\Models\Company;
use App\Models\Applicant;
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

    
    public function companyAcceptReject(Company $company, Application $application){
        return $company->id == $application->job->company_id;
    }
    
    public function applicantConfirm(Applicant $applicant, Application $application){
        return $applicant->id == $application->applicant_id;
    }
}