@extends('layouts.main')

@section('body')
  
<div class="row mt-5">
  <div class="col">
    <div class="container">
      <div class="card shadow-lg">

        <!-- heading -->
        <div class="card-header text-center">
          <h3>Applicant Registration</h3>
        </div>

        <div class="card-body">
          <div class="row pb-4">

            <!-- syarat dan ketentuan -->
            <div class="col-md-5 offset-md-1">
              <div class="card">
                <div class="card-header text-center">
                  <h3>Term and Condition</h3>
                </div>
                <div class="card-body p-4 text-justify">
                  <h5>Welcome to Mimpy.ID</h5>
                  <p>Terms and Condition of Use berikut adalah ketentuan dalam pengunjungan situs, layanan dan fitur yang ada di website Mimpy.ID<p>
                  <p>Harapan kami Anda membaca Terms and Condition of Use ini dengan seksama. Dengan mengakses dan menggunakan website Mimpy.ID berarti Anda telah memahami dan menyetujui untuk terikat dan tunduk dengan semua peraturan yang berlaku di situs ini. Apabila Anda tidak menerima Syarat dan Ketentuan dan/atau Pernyataan Privasi, mohon untuk tidak bergabung, mengakses, melihat, mengunduh atau dengan cara lain menggunakan layanan apa pun yang ditawarkan oleh Mimpy.ID melalui Situs.
                  <p><a href="terms.php" class="btn btn-primary"><i class="fa fa-forward"></i> Baca Selengkapnya</a></p>
                </div>
              </div>
            </div>

            <!-- form -->
            <div class="col-md-5">
              <table class="table">
                <form action="/register/applicant" method="POST">
                  @csrf
                  <div class="form-group">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Full Name" name="name" required value="{{ old('name') }}">
                    @error('name')
                      <div class="small text-danger ml-2">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" required value="{{ old('email') }}">
                    @error('email')
                      <div class="small text-danger ml-2">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone Number" name="phone" required value="{{ old('phone') }}">
                    @error('phone')
                      <div class="small text-danger ml-2">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <select name="gender" class="form-control">
                      @if (old('gender') == 0)
                        <option value="0" selected>Female</option>
                        <option value="1">Male</option>
                      @else
                        <option value="0">Female</option>
                        <option value="1" selected>Male</option>
                      @endif
                    </select>
                  </div>
                  <div class="form-group">
                    <textarea type="text" class="form-control @error('address') is-invalid @enderror" placeholder="Address" name="address" required>{{ old('address') }}</textarea>
                    @error('address')
                      <div class="small text-danger ml-2">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required>
                    @error('password')
                      <div class="small text-danger ml-2">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" placeholder="Retype Password" name="password_confirmation" required>
                  </div>
                  <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">Register</button>
                  </div>
                </form>
                <div class="d-block text-center mt-3">
                  <small>Already registered? <a href="/login">Login!</a></small>
                </div>
              </table>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection