@extends('layouts.main')

@section('body')

<div class="row mt-5">
  <div class="col">
    <div class="container">
      <div class="card shadow-lg">

        <div class="card-header text-center">
          <h3>Company Registration</h3>
        </div>

        <div class="card-body">
          <div class="row mb-4">

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
                <form action="/register/company" method="POST">
                  @csrf
                  <div class="form-group">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Company Name" name="name" value="{{ old('name') }}" required>
                    @error('name')
                      <div class="small text-danger ml-2">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required>
                    @error('email')
                      <div class="small text-danger ml-2">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control @error('number') is-invalid @enderror" placeholder="Phone Number" name="number" value="{{ old('number') }}" required>
                    @error('number')
                      <div class="small text-danger ml-2">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control @error('city') is-invalid @enderror" placeholder="City" name="city" value="{{ old('city') }}" required>
                    @error('city')
                      <div class="small text-danger ml-2">
                        {{ $message }}
                      </div>
                    @enderror
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
                    <textarea type="text" class="form-control @error('description') is-invalid @enderror" placeholder="About Company" name="description" required>{{ old('description') }}</textarea>
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
                    <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Retype Password" name="password_confirmation" required>
                  </div>
                  <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">Register</button>
                  </div>
                </form>
                <div class="d-block text-center mt-3">
                  <small>Already registered? <a href="/register">Login!</a></small>
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