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
    return view('jobs.manage', [
      'title' => 'Jobs Data',
      'jobs' => Job::where('company_id', '=', Auth::guard('company')->user()->id)->get()
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
