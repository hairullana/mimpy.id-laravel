@extends('layouts.main')

@section('body')
<div class="container mt-5">
  <div class="card col-md-6 offset-md-3">
    <div class="card-header text-center">
      <h3>Profil</h3>
    </div>
    <div class="card-body">
      <form action="/profile" method="POST" enctype="multipart/form-data">
        @if (Auth::guard('admin')->check())
          <div class="form-group text-center">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Email" class="form-control" value="{{ Auth::guard('admin')->user()->email }}">
          </div>

        @elseif(Auth::guard('company')->check())
          <div class="row my-3">
            <div class="col text-center">
              <img src="images/company/{{ Auth::guard('company')->user()->photo }}" class="rounded img-fluid" width=35% style="max-width:200px">
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 offset-md-3 active mt-3">
              <div class="input-group mb-3">
                <div class="custom-file">
                  <input type="file" name="photo" class="custom-file-input" id="photo">
                  <label class="custom-file-label" for="photo">Profile Photo</label>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <input type="text" class="form-control" placeholder="Company Name" name="name" value="{{ Auth::guard('company')->user()->name }}">
          </div>
          <div class="form-group">
            <input type="email" class="form-control" placeholder="Email" name="email" value="{{ Auth::guard('company')->user()->email }}">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Phone Number" name="phone" value="{{ Auth::guard('company')->user()->phone }}">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="City" name="city" value="{{ Auth::guard('company')->user()->city }}">
          </div>
          <div class="form-group">
            <textarea type="text" class="form-control" placeholder="Address" name="address">{{ Auth::guard('company')->user()->address }}</textarea>
          </div>
          <div class="form-group">
            <textarea class="form-control" placeholder="About Company" name="description">{{ Auth::guard('company')->user()->description }}</textarea>
          </div>

        @elseif(Auth::guard('applicant')->check())
          <div class="row my-3">
            <div class="col text-center">
              <img src="/images/applicant/{{ Auth::guard('applicant')->user()->photo }}" alt="" class="rounded img-fluid" width=35% style="max-width:200px">
            </div>
          </div>
              
          <div class="row">
            <div class="col-md-6 offset-md-3 active mt-3">
              <div class="input-group mb-3">
                <div class="custom-file">
                  <input type="file" name="photo" class="custom-file-input" id="photo">
                  <label class="custom-file-label" for="photo">Profile Photo</label>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <input type="text" class="form-control" placeholder="Full Name" name="name" value="{{ Auth::guard('applicant')->user()->name }}">
          </div>
          <div class="form-group">
            <input type="email" class="form-control" placeholder="Email" name="email" value="{{ Auth::guard('applicant')->user()->email }}">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Phone Number" name="phone" value="{{ Auth::guard('applicant')->user()->phone }}">
          </div>
          <div class="form-group">
            <select id="" class="form-control" name="gender">
                <?php if (Auth::guard('applicant')->user()->gender = 1) : ?>
                    <option value="1" selected>Male</option>
                    <option value="0">Female</option>
                <?php else : ?>
                    <option value="1">Male</option>
                    <option value="0" selected>Female</option>
                <?php endif; ?>
            </select>
          </div>
          <div class="form-group">
            <textarea type="text" class="form-control" placeholder="Alamat Lengkap" name="address">{{ Auth::guard('applicant')->user()->address }}</textarea>
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