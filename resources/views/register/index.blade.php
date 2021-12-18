@extends('layouts.main')

@section('body')

  <!-- pilihan registrasi -->
  <div class="row mt-5">
    <div class="col-md-6 offset-md-3">
      <div class="container">
        <div class="card shadow-lg">
          <div class="card-header text-center">
            <h3>Registrasi</h3>
          </div>
          <div class="card-body">
            <div class="container">
              <div class="row text-center">
                <div class="col-md-12 my-2">
                  <h5>I will register as...</h5>
                </div>
                <div class="col-12 my-2">
                  <a href="/register/company"><button class="btn btn-primary btn-lg btn-block">Company</button></a>
                </div>
                <div class="col-12 my-2">
                  <a href="/register/applicant"><button class="btn btn-primary btn-lg btn-block">Applicant</button></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection