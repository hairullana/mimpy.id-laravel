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
            $applications = Application::whereHas('applicant', function($query){
                                $query->where('name', 'like', '%' . request('search') . '%');
                            })->orWhereHas('job', function($query){
                                $query->where('position', 'like', '%' . request('search') . '%')
                                ->orWhereHas('company', function($query){
                                    $query->where('name', 'like', '%' . request('search') . '%');
                                });
                            })->latest();
        }

        return view('dashboard.applications', [
            'title' => 'Applications Data',
            'applications' => $applications->paginate(10)
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
        return view('dashboard.application', [
            'title' => 'Application Detail',
            'application' => Application::find($id)
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
        Application::destroy($id);

        return redirect('/dashboard/applications')->with('success', 'Application has been deleted.');
    }
}
