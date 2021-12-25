@extends('dashboard.layouts.main')

@section('body')
  <div class="text-center">
    <h3>Admin Dashboard</h3>
  </div>
  <hr>
  <div class="row text-white mt-5">
    <div class="card bg-info mx-auto" style="width: 25rem;">
      <div class="card-body">
        <div class="card-body-icon"><i class="fas fa-building"></i></div>
        <h5 class="card-title"><strong>COMPANIES</strong></h5>
        <div class="display-4">{{ DB::table('companies')->count() }}</div>
        <a href="/dashboard/companies"><p class="card-text text-white">See Details <i class="fas fa-angle-double-right ml-2"></i></p></a>
      </div>
    </div>
    <div class="card bg-danger mx-auto" style="width: 25rem;">
      <div class="card-body">
        <div class="card-body-icon"><i class="fas fa-address-card"></i></div>
        <h5 class="card-title"><strong>APPLICANTS</strong></h5>
        <div class="display-4">{{ DB::table('applicants')->count() }}</div>
        <a href="/dashboard/applicants"><p class="card-text text-white">See Details <i class="fas fa-angle-double-right ml-2"></i></p></a>
      </div>
    </div>
  </div>
  <div class="row text-white mt-5">
    <div class="card bg-warning mx-auto" style="width: 25rem;">
      <div class="card-body">
        <div class="card-body-icon"><i class="fas fa-sticky-note"></i></div>
        <h5 class="card-title"><strong>JOBS</strong></h5>
        <div class="display-4">{{ DB::table('jobs')->count() }}</div>
        <a href="/dashboard/jobs"><p class="card-text text-white">See Details <i class="fas fa-angle-double-right ml-2"></i></p></a>
      </div>
    </div>
    <div class="card bg-primary mx-auto" style="width: 25rem;">
      <div class="card-body">
        <div class="card-body-icon"><i class="fas fa-address-card"></i></div>
        <h5 class="card-title"><strong>APPLICATIONS</strong></h5>
        <div class="display-4">{{ DB::table('applications')->count() }}</div>
        <a href="/dashboard/applications"><p class="card-text text-white">See Details <i class="fas fa-angle-double-right ml-2"></i></p></a>
      </div>
    </div>
  </div>
@endsection