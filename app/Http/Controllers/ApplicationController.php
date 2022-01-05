<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::join('jobs', function($join){
            $join->on('applications.job_id', 'jobs.id');
        })->join('applicants', function($join){
            $join->on('applications.applicant_id', 'applicants.id');
        })
        ->where('jobs.company_id', Auth::guard('company')->user()->id)
        ->select('applications.id as id', 'applicants.name as applicant', 'jobs.position as position', 'applications.status as status', 'applications.created_at as created_at')
        ->latest();

        return view('applications.index', [
            'title' => 'Manage Applications',
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

    public function accept($id){
        Application::find($id)->update(['status' => 1]);

        return redirect('/applications')->with('success', 'Application has been accepted.');
    }

    public function reject($id){
        Application::find($id)->update(['status' => 0]);

        return redirect('/applications')->with('success', 'Application has been rejected.');
    }
}
