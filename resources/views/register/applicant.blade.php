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
                <form action="/register/company" method="POST">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Full Name" name="name">
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control" placeholder="Email" name="email">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Phone Number" name="number">
                  </div>
                  <div class="form-group">
                    <select name="gender" id="" class="form-control">
                      <option value="pria">Male</option>
                      <option value="wanita">Female</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <textarea type="text" class="form-control" placeholder="Address" name="address"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" placeholder="Retype Password" name="password2">
                  </div>
                  <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">Register</button>
                  </div>
                </form>
              </table>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection