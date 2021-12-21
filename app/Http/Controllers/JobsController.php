<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobsController extends Controller
{
  public function index()
  {
    
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
