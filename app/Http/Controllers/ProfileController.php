<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Company;
use App\Models\Applicant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index', [
          'title' => 'My Profile'
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
            'photo' => ['image', 'file', 'max:1024'],
            'name' => ['required', 'min:5'],
            'email' => ['required', 'email', 'unique:companies,email,'.$id, 'unique:applicants'],
            'phone' => ['required', 'unique:companies,phone,'.$id, 'unique:applicants'],
            'city' => ['required', 'min:4'],
            'address' => ['required', 'min:5'],
            'description' => ['required','min:10']
          ]);

          if($request->file('photo')) {
            if($request->oldPhoto != 'images/company/default.jpg'){
              Storage::disk('public')->delete($request->oldPhoto);
            }
            $validData['photo'] = $request->file('photo')->store('images/company', 'public');
          }

          Company::where('id', $id)->update($validData);
        } else if (Auth::guard('applicant')->check()){
            $validData = $request->validate([
                'photo' => ['image', 'file', 'max:1024'],
                'name' => ['required', 'min:3'],
                'email' => ['required', 'email', 'unique:companies', 'unique:applicants,email,'.$id],
                'phone' => ['required', 'unique:companies', 'unique:applicants,phone,'.$id],
                'gender' => ['required'],
                'address' => ['required', 'min:5']
            ]);

            if($request->file('photo')) {
              if($request->oldPhoto != 'images/company/default.jpg'){
                Storage::disk('public')->delete($request->oldPhoto);
              }
              $validData['photo'] = $request->file('photo')->store('images/applicant', 'public');
            }

            Applicant::where('id', $id)->update($validData);
        }

        return back()->with('success', 'Profile has been updated!');
    }

    public function destroy($id)
    {
        //
    }

    public function changePassword() {
        return view('profile.password', [
            'title' => 'Change Password'
        ]);
    }

    public function updatePassword(Request $request) {
        $request->validate([
            'current_password'  => ['required'],
            'password' => ['required', 'min:3', 'confirmed'],
            'password_confirmation' => ['required']
        ]);

        if (Auth::guard('admin')->check()){
          $user = Admin::find(Auth::guard('admin')->user()->id);
        } else if(Auth::guard('company')->check()) {
          $user = Company::find(Auth::guard('company')->user()->id);
        } else if(Auth::guard('applicant')->check()) {
          $user = Applicant::find(Auth::guard('applicant')->user()->id);
        }

        // dd($user->password);

        if (!Hash::check($request->current_password, $user->password)) {
          return back()->with('error', 'Current password does not match!');
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success', 'Password successfully changed!');
    }
}
