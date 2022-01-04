<?php

use App\Models\Job;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JobDashboardController;
use App\Http\Controllers\CompanyDashboardController;
use App\Http\Controllers\ApplicantDashboardController;
use App\Http\Controllers\ApplicationDashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
Route::group(['middleware' => 'auth:company'], function() {
  Route::resource('/jobs', JobController::class, ['except' => ['show']]);
});
Route::get('/jobs/{job:id}', [JobController::class, 'show']);

// terms
Route::get('/term', function(){ return view('term', ['title' => 'Term and Condition']); });

// login
Route::get('/login', [LoginController::class,'index'] )->name('login')->middleware('guest:admin,company,applicant');
Route::post('/login', [LoginController::class,'login'] )->middleware('guest:admin,company,applicant');
// logout
Route::post('/logout', [LoginController::class,'logout'] );

// register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest:admin,company,applicant');
Route::get('/register/company', [RegisterController::class, 'company'])->middleware('guest:admin,company,applicant');
Route::post('/register/company', [RegisterController::class, 'companyRegister'])->middleware('guest:admin,company,applicant');
Route::get('/register/applicant', [RegisterController::class, 'applicant'])->middleware('guest:admin,company,applicant');
Route::post('/register/applicant', [RegisterController::class, 'applicantRegister'])->middleware('guest:admin,company,applicant');

// update profile
Route::resource('/profile', ProfileController::class)->middleware('auth:admin,company,applicant');
// update password
Route::get('/change-password', [ProfileController::class, 'changePassword'])->middleware('auth:admin,company,applicant');
Route::post('/change-password', [ProfileController::class, 'updatePassword'])->middleware('auth:admin,company,applicant');

// dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth:admin');
Route::resource('/dashboard/companies', CompanyDashboardController::class)->middleware('auth:admin');
Route::resource('/dashboard/jobs', JobDashboardController::class)->middleware('auth:admin');
Route::resource('/dashboard/applicants', ApplicantDashboardController::class)->middleware('auth:admin');
Route::resource('/dashboard/applications', ApplicationDashboardController::class)->middleware('auth:admin');