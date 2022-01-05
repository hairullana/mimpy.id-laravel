<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Application;
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
    return view('jobs.create', [
      'title' => 'Create Job Vacancy'
    ]);
  }

  public function store(Request $request)
  {
    $validData = $request->validate([
      'position' => ['required', 'min:3', 'max:50'],
      'education_id' => ['required'],
      'jobdesk' => ['required'],
      'description' => ['required']
    ]);

    $validData['company_id'] = Auth::guard('company')->user()->id;
    $validData['status'] = 1;

    Job::create($validData);

    return redirect('/jobs')->with('success', 'New job has been published.');
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
    return view('jobs.edit', [
      'title' => 'Edit Job',
      'job' => Job::find($id)
    ]);
  }

  public function update(Request $request, $id)
  {
    
  }

  public function destroy($id)
  {
    Job::destroy($id);
    Application::where('job_id', $id)->delete();

    return redirect('/jobs')->with('success', 'Job has been deleted.');
  }
}
