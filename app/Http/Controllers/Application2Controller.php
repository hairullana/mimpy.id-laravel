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
        return view('applicant.applications.index', [
            'title' => 'Manage Application',
            'applications' => Application::where('applicant_id', '=', Auth::guard('applicant')->user()->id)->get()
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
        return view('applications.companyLetter', [
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
