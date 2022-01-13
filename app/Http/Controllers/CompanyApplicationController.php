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

        if(request('search')){
            $applications = Application::whereHas('job', function($query) {
                                $query->where('company_id', Auth::guard('company')->user()->id);
                            })->where(function($query){
                                $query->whereHas('job', function($query) {
                                    $query->where('position', 'like', '%' . request('search') . '%');
                                })->orWhereHas('applicant', function($query){
                                    $query->where('name', 'like', '%' . request('search') . '%');
                                });
                            })->latest();
        }

        return view('company.applications.index', [
            'title' => 'Manage Applications',
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('company.applications.letter', [
            'title' => 'Application Letter',
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
