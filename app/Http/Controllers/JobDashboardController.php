<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class JobDashboardController extends Controller
{
    public function index()
    {
        $jobs = Job::latest();

        if(request('search')){
            $jobs = Job::where('position', 'like', '%' . request('search') . '%')
                    ->orWhereHas('company', function($query){
                        $query->where('name', 'like', '%' . request('search') . '%')
                        ->orWhere('city', 'like', '%' . request('search') . '%')
                        ->orWhere('address', 'like', '%' . request('search') . '%');
                    })->latest();
        }

        return view('dashboard.jobs', [
            'title' => 'Jobs Data',
            'jobs' => $jobs->paginate(10)
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
        return view('dashboard.job', [
            'title' => 'Job Detail',
            'job' => Job::find($id)
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Job::destroy($id);
        Application::where('job_id', $id)->delete();

        return redirect('/dashboard/jobs')->with('success', 'Job has been deleted.');
    }
}
