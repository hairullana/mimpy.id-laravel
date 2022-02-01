<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ApplicantDashboardController extends Controller
{
  public function index(){
    return view('dashboard.applicants', [
      'title' => 'Applicants Data',
      'applicants' => Applicant::latest()->filterAdminAuth(request(['search']), 'admin')->paginate(10)
    ]);
  }

  public function show($id){
    return view('dashboard.applicant', [
      'title' => 'Applicant Detail',
      'applicant' => Applicant::find($id)
    ]);
  }

  public function destroy($id){
    Applicant::destroy($id);
    Application::where('applicant_id', $id)->delete();

    return redirect('/dashboard/applicants')->with('success', 'Applicant has been deleted.');
  }
}
