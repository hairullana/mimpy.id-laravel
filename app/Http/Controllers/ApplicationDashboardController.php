<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationDashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.applications', [
            'title' => 'Applications Data',
            'applications' => Application::latest()->filterAdminAuth(request(['search']))->paginate(10)
        ]);
    }

    public function show($id)
    {
        return view('dashboard.application', [
            'title' => 'Application Detail',
            'application' => Application::find($id)
        ]);
    }

    public function destroy($id)
    {
        Application::destroy($id);

        return redirect('/dashboard/applications')->with('success', 'Application has been deleted.');
    }
}
