<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Applicant;
use Illuminate\Support\Facades\Auth;

class CompanyApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::whereHas('job', function($query){
                            $query->where('company_id', Auth::guard('company')->user()->id);
                        })->latest();

        return view('company.applications.index', [
            'title' => 'Manage Applications',
            'applications' => $applications->filterCompanyAuth(request(['search']))->paginate(10)
        ]);
    }

    public function show($id)
    {
        return view('company.applications.letter', [
            'title' => 'Application Letter',
            'application' => Application::find($id)
        ]);
    }

    public function acceptPage($id){
        $this->authorize('acceptReject', Application::find($id));

        return view('company.applications.accept', [
            'title' => 'Accept Applicant',
            'application' => Application::find($id)
        ]);
    }

    public function accept(Request $request){
        Application::find($request['id'])->update([
            'status' => 1,
            'company_letter' => $request['company_letter']
        ]);

        return redirect('/company/applications')->with('success', 'Application has been accepted.');
    }

    public function reject($id){
        $this->authorize('companyAcceptReject', Application::find($id));

        Application::find($id)->update(['status' => 0]);

        return redirect('/company/applications')->with('success', 'Application has been rejected.');
    }
}
