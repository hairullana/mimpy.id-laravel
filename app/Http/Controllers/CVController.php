<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Applicant;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CVController extends Controller
{
    public function index(){
        return view('applicant.cv.index', [
            'title' => 'Curriculum Vitae'
        ]);
    }

    public function update(Request $request){
      $validData = $request->validate([
        'cv' => ['mimes:jpeg,jpg,png,pdf,doc,docx', 'file', 'max:10240', 'required']
      ]);

      if($request->oldCV){
        Storage::disk('public')->delete($request->oldCV);
      }
      $validData['cv'] = $request->file('cv')->store('cv', 'public');

      Applicant::find(Auth::guard('applicant')->user()->id)->update($validData);

      return back()->with('success', 'CV has been updated!');
    }
}
