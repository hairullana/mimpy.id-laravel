@extends('layouts.main')

@section('body')
<div class="container mt-5">
  <div class="card col-md-6 offset-md-3">
    <div class="card-header text-center">
      <h3>Profil</h3>
    </div>
    <div class="card-body">

      @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif


      <?php
      if (Auth::guard('admin')->check()){
        $id = Auth::guard('admin')->user()->id;
      } else if(Auth::guard('company')->check()) {
        $id = Auth::guard('company')->user()->id;
      } else if(Auth::guard('applicant')->check()) {
        $id = Auth::guard('applicant')->user()->id;
      }
      ?>

      <form action="/profile/{{ $id }}" method="POST" enctype="multipart/form-data">
        @method('put')
        @csrf

        @if (Auth::guard('admin')->check())
          <div class="form-group text-center">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" value="{{ Auth::guard('admin')->user()->email }}">
            @error('email')
              <div class="small text-danger ml-2">
                {{ $message }}
              </div>
            @enderror
          </div>

        @elseif(Auth::guard('company')->check())
          <div class="row my-3">
            <div class="col text-center">
              <img src="/storage/{{ Auth::guard('company')->user()->photo }}" class="rounded img-fluid" width=35% style="max-width:200px">
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 offset-md-3 active mt-3">
              <div class="input-group mb-3">
                <div class="custom-file">
                  <input type="hidden" name="oldPhoto" value="{{ Auth::guard('company')->user()->photo }}">
                  <input type="file" name="photo" class="custom-file-input @error('photo') is-invalid @enderror" id="photo">
                  <label class="custom-file-label" for="photo">Profile Photo</label>
                  @error('photo')
                    <div class="small text-danger ml-2">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Company Name" name="name" value="{{ Auth::guard('company')->user()->name }}">
            @error('name')
              <div class="small text-danger ml-2">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ Auth::guard('company')->user()->email }}">
            @error('email')
              <div class="small text-danger ml-2">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <input type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone Number" name="phone" value="{{ Auth::guard('company')->user()->phone }}">
            @error('phone')
              <div class="small text-danger ml-2">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <input type="text" class="form-control @error('city') is-invalid @enderror" placeholder="City" name="city" value="{{ Auth::guard('company')->user()->city }}">
            @error('city')
              <div class="small text-danger ml-2">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <textarea type="text" class="form-control @error('address') is-invalid @enderror" placeholder="Address" name="address">{{ Auth::guard('company')->user()->address }}</textarea>
            @error('address')
              <div class="small text-danger ml-2">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <textarea class="form-control @error('description') is-invalid @enderror" placeholder="About Company" name="description">{{ Auth::guard('company')->user()->description }}</textarea>
            @error('description')
              <div class="small text-danger ml-2">
                {{ $message }}
              </div>
            @enderror
          </div>

        @elseif(Auth::guard('applicant')->check())
          <div class="row my-3">
            <div class="col text-center">
              <img src="/storage/{{ Auth::guard('applicant')->user()->photo }}" alt="" class="rounded img-fluid" width=35% style="max-width:200px">
            </div>
          </div>
              
          <div class="row">
            <div class="col-md-6 offset-md-3 active mt-3">
              <div class="input-group mb-3">
                <div class="custom-file">
                  <input type="hidden" name="oldPhoto" value="{{ Auth::guard('applicant')->user()->photo }}">
                  <input type="file" name="photo" class="custom-file-input @error('photo') is-invalid @enderror" id="photo">
                  <label class="custom-file-label" for="photo">Profile Photo</label>
                  @error('photo')
                    <div class="small text-danger ml-2">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Full Name" name="name" value="{{ Auth::guard('applicant')->user()->name }}">
            @error('name')
              <div class="small text-danger ml-2">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ Auth::guard('applicant')->user()->email }}">
            @error('email')
              <div class="small text-danger ml-2">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <input type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone Number" name="phone" value="{{ Auth::guard('applicant')->user()->phone }}">
            @error('phone')
              <div class="small text-danger ml-2">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <select class="form-control @error('gender') is-invalid @enderror" name="gender">
                @if (Auth::guard('applicant')->user()->gender == 1)
                    <option value="1" selected>Male</option>
                    <option value="0">Female</option>
                @else :
                    <option value="1">Male</option>
                    <option value="0" selected>Female</option>
                @endif
            </select>
            @error('gender')
              <div class="small text-danger ml-2">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <textarea type="text" class="form-control @error('address') is-invalid @enderror" placeholder="Alamat Lengkap" name="address">{{ Auth::guard('applicant')->user()->address }}</textarea>
            @error('address')
              <div class="small text-danger ml-2">
                {{ $message }}
              </div>
            @enderror
          </div>
        @endif

        <div class="form-group text-center">
          <button type="submit" class="btn btn-primary">Update Profile</button> <a href="/change-password" class="btn btn-danger">Change Password</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection