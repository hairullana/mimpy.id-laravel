<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicantRequest;
use App\Http\Requests\CompanyRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Applicant;
use App\Models\Company;

class RegisterController extends Controller
{
    public function index(){
        return view('register.index', [
            'title' => 'Register'
        ]);
    }

    public function company(){
        return view(('register.company'), [
            'title' => 'Company Register'
        ]);
    }

    public function applicant(){
        return view(('register.applicant'), [
            'title' => 'Applicant Register'
        ]);
    }

    public function companyRegister(CompanyRequest $request){
        $validData = $request->validated();
        $validData['password'] = Hash::make($validData['password']);
        $validData['photo'] = 'images/company/default.jpg';

        Company::create($validData);

        return redirect('/login')->with('success', 'Registration successfull! Please login.');
    }

    public function applicantRegister(ApplicantRequest $request){
    
        $validData = $request->validated();
        $validData['password'] = Hash::make($validData['password']);
        $validData['photo'] = 'images/applicant/default.jpg';
        $validData['cv'] = '';
        Applicant::create($validData);

        return redirect('/login')->with('success', 'Registration successfull! Please login.');
    }
}
