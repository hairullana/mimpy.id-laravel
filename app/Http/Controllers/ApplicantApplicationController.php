<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Application;
use Illuminate\Http\Request;
// use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ApplicantApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::where('applicant_id', '=', Auth::guard('applicant')->user()->id)->latest();

        if(request('search')){
            $applications = Application::where('applicant_id', '=', Auth::guard('applicant')->user()->id)
                            ->whereHas('job', function($query){
                                $query->where('position', 'like', '%' . request('search') . '%')
                                ->orWhereHas('company', function($query){
                                    $query->where('name', 'like', '%' . request('search') . '%');
                                });
                            })->latest();
        }

        return view('applicant.applications.index', [
            'title' => 'Manage Application',
            'applications' => $applications->paginate(10)
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
        $this->authorize('applicantConfirm', Application::find($id));

        Application::find($id)->update(['confirm' => 1]);

        return redirect('/applicant/applications')->with('success', 'Application has been confirmation.');
    }
}
