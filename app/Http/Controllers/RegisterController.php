<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        return view('register.index', [
            'title' => 'Register'
        ]);
    }

    public function company(){
        return view(('register.company'), [
            'title' => 'Company Register'
        ]);
    }

    public function applicant(){
        return view(('register.applicant'), [
            'title' => 'Applicant Register'
        ]);
    }
}
