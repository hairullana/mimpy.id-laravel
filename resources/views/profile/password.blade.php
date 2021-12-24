@extends('layouts.main')

@section('body')
<div class="container my-5">
  <div class="row">
    <div class="col-xl-6 offset-xl-3">
      <div class="card">
        <div class="card-header text-center">
          <h3>Change Password</h3>
        </div>
        <div class="card-body">

          @if(session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              {{ session('error') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif
          
          @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif


          <form action="change-password" method="POST">
            @csrf
            <div class="form-group">
              <label for="current_password">Current Password</label>
              <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="current_password" name="current_password" required autofocus>
              @error('current_password')
                <div class="small text-danger ml-2">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="password">New Password</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
              @error('password')
                <div class="small text-danger ml-2">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="password_confirmation">Retype New Password</label>
              <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" required>
              @error('password_confirmation')
                <div class="small text-danger ml-2">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group d-flex justify-content-end">
              <button type="reset" class="btn btn-danger mx-1">Reset</button>
              <button type="submit" class="btn btn-primary mx-1">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection