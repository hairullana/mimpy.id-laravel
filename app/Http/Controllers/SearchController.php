<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SearchController extends Controller
{
    public function index(Request $request){
        $jobs = Job::latest();

        if(request('city') && request('position') && request('education')){
            $jobs = Job::whereHas('company', function($query){
                        $query->where('city', 'like', '%' . request('city') . '%')
                            ->orWhere('address', 'like', '%' . request('city') . '%');
                    })
                    ->where('position', 'like', '%' . request('position') . '%')
                    ->where('education_id', '<=', request('education'))
                    ->latest();
        } else if(request('city') && request('position')){
            $jobs = Job::whereHas('company', function($query){
                        $query->where('city', 'like', '%' . request('city') . '%')
                            ->orWhere('address', 'like', '%' . request('city') . '%');
                    })
                    ->where('position', 'like', '%' . request('position') . '%')
                    ->latest();
        } else if(request('position') && request('education')){
            $jobs = Job::where('position', 'like', '%' . request('position') . '%')
                    ->where('education_id', '<=', request('education'))
                    ->latest();
        } else if(request('city') && request('education')){
            $jobs = Job::whereHas('company', function($query){
                        $query->where('city', 'like', '%' . request('city') . '%')
                            ->orWhere('address', 'like', '%' . request('city') . '%');
                    })
                    ->where('education_id', '<=', request('education'))
                    ->latest();
        } else if(request('city')){
            $jobs = Job::whereHas('company', function($query){
                        $query->where('city', 'like', '%' . request('city') . '%')
                            ->orWhere('address', 'like', '%' . request('city') . '%');
                    })
                    ->latest();
        } else if(request('position')){
            $jobs = Job::where('position', 'like', '%' . request('position') . '%')
                    ->latest();
        } else if(request('education')){
            $jobs = Job::where('education_id', '<=', request('education'))
                    ->latest();
        }

        return view('search.index', [
            'title' => 'Find Spesific Job',
            'jobs' => $jobs->paginate(10),
            'educations' => Education::all()
        ]);
    }
}
