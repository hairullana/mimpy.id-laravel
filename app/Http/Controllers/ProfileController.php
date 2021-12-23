<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Company;
use App\Models\Applicant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
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
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        if (Auth::guard('admin')->check()){
            $validData = $request->validate([
                'email' => ['required', 'email', 'unique:admins,email,'.$id, 'unique:companies', 'unique:applicants']
            ]);
        
            Admin::where('id', $id)->update($validData);
        } else if (Auth::guard('company')->check()){
            $validData = $request->validate([
                'name' => ['required', 'min:5'],
                'email' => ['required', 'email', 'unique:companies,email,'.$id, 'unique:applicants'],
                'phone' => ['required', 'unique:companies,phone,'.$id, 'unique:applicants'],
                'city' => ['required', 'min:4'],
                'address' => ['required', 'min:5'],
                'description' => ['required','min:10']
            ]);

            Company::where('id', $id)->update($validData);
        } else if (Auth::guard('applicant')->check()){
            $validData = $request->validate([
                'name' => ['required', 'min:3'],
                'email' => ['required', 'email', 'unique:companies', 'unique:applicants,email,'.$id],
                'phone' => ['required', 'unique:companies', 'unique:applicants,phone,'.$id],
                'gender' => ['required'],
                'address' => ['required', 'min:5']
            ]);

            Applicant::where('id', $id)->update($validData);
        }

        return back()->with('success', 'Profile has been updated!');
    }

    public function destroy($id)
    {
        //
    }
}
