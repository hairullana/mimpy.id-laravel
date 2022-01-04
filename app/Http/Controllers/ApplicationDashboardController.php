<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationDashboardController extends Controller
{
    public function index()
    {
        $applications = Application::latest();

        if(request('search')){
            $applications = Application::join('applicants', function($join){
                                $join->on('applicants.id', '=', 'applications.applicant_id');
                            })->join('jobs', function($join){
                                $join->on('jobs.id', '=', 'applications.job_id');
                            })->join('companies', function($join){
                                $join->on('companies.id', '=', 'jobs.company_id');
                            })->select('applications.id as id', 'applicants.name as applicant', 'jobs.position as position', 'companies.name as company', 'jobs.status as status')
                            ->where('applicants.name', 'like', '%' . request('search') . '%')
                            ->orWhere('companies.name', 'like', '%' . request('search') . '%')
                            ->orWhere('jobs.position', 'like', '%' . request('search') . '%');
        }

        return view('dashboard.applications', [
            'title' => 'Applications Data',
            'applications' => $applications->paginate(5)
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
