<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Company;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CompanyDashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.companies', [
            'title' => 'Companies Data',
            'companies' => Company::latest()->filterAdminAuth(request(['search']))->paginate(10)
        ]);
    }

    public function show($id)
    {
        return view('dashboard.company', [
            'title' => Company::find($id)->name . ' Company',
            'company' => Company::find($id)
        ]);
    }

    public function destroy($id)
    {
        $company = Company::find($id);

        if($company->photo != 'images/company/default.jpg'){
            Storage::disk('public')->delete($company->photo);
        }

        // DELETE COMPANY, JOBS, AND APPLICATIONS
        Company::destroy($company->id);
        $jobs = Job::where('company_id', $company->id)->get();
        foreach ($jobs as $job) {
            Application::where('job_id', $job->id)->delete();
        }
        Job::where('company_id', $company->id)->delete();

        return redirect('/dashboard/companies')->with('success', 'Company has been deleted.');
    }
}
