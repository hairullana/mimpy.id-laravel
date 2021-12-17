@extends('layouts.main')

@section('body')

  <div class="row">
    <div class="col-md-4 offset-md-4 mt-5">
      <div class="card shadow-lg">
        <div class="card-header text-center">
          <h3>LOGIN</h3>
        </div>

        <!-- form login -->
        <div class="card-body">

          {{-- alert --}}
          @if (session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              {{ session('loginError') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif

          <form action="/login" method="POST">
            <div class="text-center mb-3">
              @csrf

              {{-- choose role --}}
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="role" id="admin" value="admin">
                  <label class="form-check-label" for="admin">Admin</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="role" id="company" value="company">
                  <label class="form-check-label" for="company">Company</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="role" id="applicant" value="applicant">
                  <label class="form-check-label" for="applicant">Applicant</label>
                </div>
              </div>

              {{-- email --}}
              <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" id="email" placeholder="Email" name="email" id="email" required autofocus>
              </div>

              {{-- password --}}
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
              </div>

              {{-- button --}}
              <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form>
          </div>
        </div>
      </div>
  </div>

@endsection

