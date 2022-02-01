<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EducationDashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.educations.index', [
            'title' => 'Manage Educations',
            'educations' => Education::all()
        ]);
    }

    public function create()
    {
        return view('dashboard.educations.create', [
            'title' => 'Create New Education',
            'education' => Education::get()->last()
        ]);
    }

    public function store(Request $request)
    {
        $validData = $request->validate([
            'name' => ['required', 'unique:educations']
        ]);

        Education::create($validData);

        return redirect('/dashboard/educations')->with('success', 'New educations has been created.');
    }

    public function show(Education $education)
    {
        //
    }

    public function edit(Education $education)
    {
        return view('dashboard.educations.edit', [
            'title' => 'Edit Education',
            'education' => $education
        ]);
    }

    public function update(Request $request, Education $education)
    {
        $validData = $request->validate([
            'name' => ['required', 'unique:educations']
        ]);

        Education::where('id', $education->id)->update($validData);

        return redirect('/dashboard/educations')->with('success', 'Educations has been updated.');
    }

    public function destroy(Education $education)
    {
        //
    }
}
