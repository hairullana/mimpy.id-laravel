<?php

use App\Http\Controllers\JobsController;
use App\Models\Job;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// index
Route::get('/', function () {
  $jobs = Job::latest();

  if(request('search')){
    $jobs = DB::table('jobs')
            ->join('companies', function($join){
              $join->on('jobs.company_id', '=', 'companies.id');
            })
            ->select('jobs.id as idJob', 'jobs.*', 'companies.*')
            ->where('companies.name', 'like', '%' . request('search') . '%')
            ->orWhere('companies.city', 'like', '%' . request('search') . '%')
            ->orWhere('jobs.position', 'like', '%' . request('search') . '%');
            // ->get();
  }

  // dd($jobs);
  return view('index', [
    'title' => 'Minimize Unemployment',
    'jobs' => $jobs->paginate(6)
  ]);
});

// show post
Route::get('/job/{job:id}', [JobsController::class, 'show']);



// terms
Route::get('/term', function(){ return view('term', ['title' => 'Term and Condition']); });

// login
Route::get('/login', [LoginController::class,'index'] );
Route::post('/login', [LoginController::class,'login'] );
Route::post('/logout', [LoginController::class,'logout'] );

// register
Route::get('/register', [RegisterController::class, 'index']);
Route::get('/register/company', [RegisterController::class, 'company']);
Route::post('/register/company', [RegisterController::class, 'companyRegister']);
Route::get('/register/applicant', [RegisterController::class, 'applicant']);
Route::post('/register/applicant', [RegisterController::class, 'applicantRegister']);

// update profile
Route::resource('/profile', ProfileController::class);