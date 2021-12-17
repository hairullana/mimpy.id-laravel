<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\CssSelector\Node\FunctionNode;

class LoginController extends Controller
{
    public function index(){
        return view('login.index', [
            'title' => 'Login',
        ]);
    }

    public function login(Request $request){
      // if role empty
      if(!$request->role){
        return back()->with('loginError', 'Choose user role!');
      } else {

        // 
        $credentials = $request->validate([
          'email' => 'required|email',
          'password' => 'required'
        ]);

        // dd($credentials);

        if ($request->role == 'applicant') {
          if(Auth::guard('applicant')->attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/');
          }
        } else if ($request->role == 'company') {
          if(Auth::guard('company')->attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/');
          }
        }
      }

      return back()->with('loginError', 'Login failed!');
    }

    public function logout(Request $request) {
      if( Auth::guard('admin')->check()){
        Auth::guard('admin')->logout();
      } else if (Auth::guard('company')->check()){
        Auth::guard('company')->logout();
      } else if (Auth::guard('applicant')->check()){
        Auth::guard('applicant')->logout();
      }
  
      // suapaya gak bisa dipake
      $request->session()->invalidate();
  
      // supaya tidak dibajak
      $request->session()->regenerateToken();
  
      return redirect('/login');
    }
}
