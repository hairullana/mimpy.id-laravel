<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
  public function index()
  {
    $jobs = Job::where('company_id', Auth::guard('company')->user()->id)->latest();

    if(request('search')){
      $jobs = Job::where('company_id', '=', Auth::guard('company')->user()->id)
              ->where(function($query){
                $query->where('position', 'like', '%' . request('search') . '%')
                      ->orWhere('education_id', 'like', '%' . request('search') . '%');
              })->latest();
    }

    return view('jobs.manage', [
      'title' => 'Jobs Data',
      'jobs' => $jobs->paginate(5)
    ]);
  }

  public function create()
  {
    
  }

  public function store(Request $request)
  {
    
  }

  public function show(Job $job)
  {
    return view('jobs.show', [
      'title' => 'Detail Job',
      'job' => $job
    ]);
  }

  public function edit($id)
  {
    
  }

  public function update(Request $request, $id)
  {
    
  }

  public function destroy($id)
  {
    
  }
}
