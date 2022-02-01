<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SearchController extends Controller
{
    public function index(Request $request){
        return view('search.index', [
            'title' => 'Find Spesific Job',
            'jobs' => Job::latest()->spesificSearch(request(['city', 'position', 'education']))->paginate(10),
            'educations' => Education::all()
        ]);
    }
}
