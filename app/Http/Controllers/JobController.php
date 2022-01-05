<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
  public function index()
  {
    $jobs = Job::where('company_id', Auth::guard('company')->user()->id)
            ->join('educations', 'jobs.education_id', '=', 'educations.id')
            ->select('educations.name as education', 'jobs.created_at as created_at', 'jobs.position as position', 'jobs.id as id')
            ->latest();

    if(request('search')){
      $jobs = Job::where('company_id', '=', Auth::guard('company')->user()->id)
              ->join('educations', 'jobs.education_id', '=', 'educations.id')
              ->select('educations.name as education', 'jobs.created_at as created_at', 'jobs.position as position', 'jobs.id as id')
              ->where(function($query){
                $query->where('position', 'like', '%' . request('search') . '%')
                      ->orWhere('education_id', 'like', '%' . request('search') . '%');
              })->latest();
    }

    return view('jobs.index', [
      'title' => 'Jobs Data',
      'jobs' => $jobs->paginate(5)
    ]);
  }

  public function create()
  {
    return view('jobs.create', [
      'title' => 'Create Job Vacancy',
      'educations' => Education::all()
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

  public function show($id)
  {
    return view('jobs.show', [
      'title' => 'Detail Job',
      'job' => Job::find($id),
      'education' => Education::find(Job::find($id)->education_id)->name
    ]);
  }

  public function edit($id)
  {
    return view('jobs.edit', [
      'title' => 'Edit Job',
      'job' => Job::find($id),
      'educations' => Education::all()
    ]);
  }

  public function update(Request $request, $id)
  {
    $validData = $request->validate([
      'position' => ['required', 'min:3', 'max:50'],
      'education_id' => ['required'],
      'jobdesk' => ['required'],
      'description' => ['required']
    ]);

    Job::find($id)->update($validData);
    return redirect('/jobs')->with('success', 'Job has been updated.');
  }

  public function destroy($id)
  {
    Job::destroy($id);
    Application::where('job_id', $id)->delete();

    return redirect('/jobs')->with('success', 'Job has been deleted.');
  }

  public function close($id){
    Job::find($id)->update(['status' => 0]);

    return redirect('/jobs')->with('success', 'Job has been closed.');
  }
}
