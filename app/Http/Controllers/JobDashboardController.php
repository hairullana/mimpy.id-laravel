<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class JobDashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.jobs', [
            'title' => 'Jobs Data',
            'jobs' => Job::latest()->filterAdminAuth(request(['search']))->paginate(10)
        ]);
    }

    public function show($id)
    {
        return view('dashboard.job', [
            'title' => 'Job Detail',
            'job' => Job::find($id)
        ]);
    }

    public function destroy($id)
    {
        Job::destroy($id);
        Application::where('job_id', $id)->delete();

        return redirect('/dashboard/jobs')->with('success', 'Job has been deleted.');
    }
}
