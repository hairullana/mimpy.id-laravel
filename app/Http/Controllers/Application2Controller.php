<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class Application2Controller extends Controller
{
    public function index()
    {
        $applications = Application::where('applicant_id', '=', Auth::guard('applicant')->user()->id)->latest();

        if(request('search')){
            $applications = Application::where('applicant_id', '=', Auth::guard('applicant')->user()->id)
                            ->join('jobs', 'jobs.id', '=', 'applications.job_id')
                            ->join('companies', 'companies.id', '=', 'jobs.company_id')
                            ->where(function($query){
                                $query->where('companies.name', 'like', '%' . request('search') . '%')
                                        ->orWhere('jobs.position', 'like', '%' . request('search') . '%');
                            })->select('companies.name as company', 'applications.id as id', 'jobs.position as position', 'applications.salary as salary', 'applications.status as status', 'applications.confirm as confirm')->latest('applications.created_at');
        }

        return view('applicant.applications.index', [
            'title' => 'Manage Application',
            'applications' => $applications->paginate(3)
        ]);
    }
    public function create($id)
    {
        return view('applicant.applications.create', [
            'title' => 'Create Application',
            'job' => Job::find($id)
        ]);
    }

    public function store(Request $request)
    {
        $validData = $request->validate([
            'job_id' => ['required'],
            'salary' => ['required', 'numeric'],
            'applicant_letter' => ['required']
        ]);

        $validData['applicant_id'] = Auth::guard('applicant')->user()->id;
        $validData['status'] = -1;
        $validData['confirm'] = 0;
        $validData['company_letter'] = '';
        
        Application::create($validData);

        return redirect('/applicant/applications')->with('success', 'Application has been created.');
    }

    public function show($id)
    {
        return view('applicant.applications.companyLetter', [
            'title' => 'Company Letter',
            'letter' => Application::find($id)
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function confirm($id){
        Application::find($id)->update(['confirm' => 1]);

        return redirect('/applicant/applications')->with('success', 'Application has been confirmation.');
    }
}
