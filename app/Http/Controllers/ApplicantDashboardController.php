<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ApplicantDashboardController extends Controller
{
    public function index()
    {
        $applicants = Applicant::latest();

        if(request('search')){
            $applicants = Applicant::where('name', 'like', '%' . request('search') . '%')
                            ->orWhere('email', 'like', '%' . request('search') . '%')
                            ->orWhere('address', 'like', '%' . request('search') . '%')
                            ->orWhere('phone', 'like', '%' . request('search') . '%');
        }

        return view('dashboard.applicants', [
            'title' => 'Applicants Data',
            'applicants' => $applicants->paginate(3)
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
        return view('dashboard.applicant', [
            'title' => 'Applicant Detail',
            'applicant' => Applicant::find($id)
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
        Applicant::destroy($id);
        Application::where('applicant_id', $id)->delete();

        return redirect('/dashboard/applicants')->with('success', 'Applicant has been deleted.');
    }
}
