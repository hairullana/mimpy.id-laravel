<?php

use App\Models\Job;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CVController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CompanyJobController;
use App\Http\Controllers\JobDashboardController;
use App\Http\Controllers\CompanyDashboardController;
use App\Http\Controllers\ApplicantDashboardController;
use App\Http\Controllers\CompanyApplicationController;
use App\Http\Controllers\EducationDashboardController;
use App\Http\Controllers\ApplicantApplicationController;
use App\Http\Controllers\ApplicationDashboardController;
use App\Http\Controllers\EmailController;
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

Route::get('/', function(){
  return view('index', [
    'jobs' => Job::all()->take(3)
  ]);
});

Route::get('/home', function () {
  $jobs = Job::where('status', 1)
          ->latest();

  if(request('search')){
    $jobs = Job::where('status', 1)
            ->where(function($query){
              $query->where('position', 'like', '%' . request('search') . '%')
              ->orWhereHas('company', function($query){
                $query->where('name', 'like', '%' . request('search') . '%')
                ->orWhere('city', 'like', '%' . request('search') . '%');
              });
            })->latest();
  }

  // dd($jobs);
  return view('home', [
    'title' => 'Minimize Unemployment',
    'jobs' => $jobs->paginate(10)
  ]);
});

// company job
Route::group(['middleware' => 'auth:company'], function() {
  Route::resource('/company/jobs', CompanyJobController::class, ['except' => ['show']]);
  Route::get('/company/jobs/{job:id}/close', [CompanyJobController::class, 'close']);
});
Route::get('/jobs/{job:id}', [CompanyJobController::class, 'show']);

// company/applications
Route::resource('/company/applications', CompanyApplicationController::class)->middleware('auth:company');
Route::get('/company/applications/{application:id}/accept', [CompanyApplicationController::class, 'acceptPage'])->middleware('auth:company');
Route::post('/company/applications/accept', [CompanyApplicationController::class, 'accept'])->middleware('auth:company');
Route::get('/company/applications/{application:id}/reject', [CompanyApplicationController::class, 'reject'])->middleware('auth:company');
// applicant/applications
Route::resource('/applicant/applications', ApplicantApplicationController::class)->middleware('auth:applicant');
Route::get('/applicant/applications/{application:id}/confirm', [ApplicantApplicationController::class, 'confirm'])->middleware('auth:applicant');
Route::get('/applicant/applications/{application:id}/create', [ApplicantApplicationController::class, 'create'])->middleware('auth:applicant');


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
Route::resource('/dashboard/educations', EducationDashboardController::class)->middleware('auth:admin');

// cv
Route::get('/cv', [CVController::class, 'index'])->middleware('auth:applicant');
Route::post('/cv', [CVController::class, 'update'])->middleware('auth:applicant');

// search
Route::get('/search', [SearchController::class, 'index'])->middleware('auth:applicant');


