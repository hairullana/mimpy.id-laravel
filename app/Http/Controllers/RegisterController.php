<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicantRequest;
use App\Http\Requests\CompanyRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Applicant;
use App\Models\Company;
use Exception;

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

        DB::beginTransaction();
        try {
            Applicant::factory()->create();
            $validData = $request->validated();
            $validData['password'] = Hash::make($validData['password']);
            $validData['photo'] = 'images/company/default.jpg';
            Company::create($validData);
            DB::commit();
            return redirect('/login')->with('success', 'Registration successfull! Please login.');
        } catch (\Exception $e){
            DB::rollBack();
            throw $e;
        }
    }

    public function applicantRegister(ApplicantRequest $request){
        
        DB::beginTransaction();
        try {
            $validData = $request->validated();
            $validData['password'] = Hash::make($validData['password']);
            $validData['photo'] = 'images/applicant/default.jpg';
            $validData['cv'] = '';
            Applicant::create($validData);
            DB::commit();
            return redirect('/login')->with('success', 'Registration successfull! Please login.');
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
