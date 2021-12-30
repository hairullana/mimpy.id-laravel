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
        $companies = Company::latest();

        if(request('search')){
            $companies = DB::table('companies')
                    ->where('name', 'like', '%' . request('search') . '%')
                    ->orWhere('city', 'like', '%' . request('search') . '%')
                    ->orWhere('address', 'like', '%' . request('search') . '%')
                    ->orWhere('phone', 'like', '%' . request('search') . '%')
                    ->orWhere('description', 'like', '%' . request('search') . '%');
        }
        return view('dashboard.companies', [
            'title' => 'Companies Data',
            'companies' => $companies->paginate(3)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return view('dashboard.showCompany', [
            'title' => Company::find($id)->name . ' Company',
            'company' => Company::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
