<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
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
  return view('index', [
    'title' => 'Minimize Unemployment',
    'jobs' => Job::all()
  ]);
});

// login
Route::get('/login', [LoginController::class,'index'] );
Route::post('/login', [LoginController::class,'login'] );
Route::post('/logout', [LoginController::class,'logout'] );

// register
Route::get('/register', [RegisterController::class, 'index']);
Route::get('/register/company', [RegisterController::class, 'company']);
Route::post('/register/company', [RegisterController::class, 'companyRegister']);
Route::get('/register/applicant', [RegisterController::class, 'applicant']);