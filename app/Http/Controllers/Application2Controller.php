<?php

namespace App\Http\Controllers;

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
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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
}
