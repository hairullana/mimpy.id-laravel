<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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

Route::get('/', function () {
  return view('index', [
    'title' => 'Minimize Unemployment',
    'jobs' => Job::all()
  ]);
});

Route::get('/login', [LoginController::class,'index'] );
Route::post('/login', [LoginController::class,'login'] );
Route::post('/logout', [LoginController::class,'logout'] );