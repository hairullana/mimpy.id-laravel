<?php if (isset($_SESSION["admin"])) : ?>
  <!-- jumbotron -->
  <div class="jumbotron jumbotron-fluid bg jumbotron-index">
      <div class="container text-center">
          <h1 class="display-1">Mimpy.ID</h1>
          <p class="lead">Minimize Unemployment - Platform Pencarian Lowongan Kerja untuk Mimpi Anda.</p>
          
          <div class="row text-center mb-3">
              <div class="col-md-3 offset-md-3">
                  <a href="profil.php"><button type="button" class="btn btn-primary btn-block font-weight-bold">Profil Admin</button></a>
              </div>
              <div class="col-md-3">
                  <a href="dashboard.php"><button type="button" class="btn btn-primary btn-block font-weight-bold">Dashboard Admin</button></a>
              </div>
          </div>
      </div>
  </div>
  <!-- end jumbotron -->
<?php elseif (isset($_SESSION["perusahaan"])) : ?>
  <!-- jumbotron -->
  <div class="jumbotron jumbotron-fluid bg jumbotron-index">
      <div class="container text-center">
          <h1 class="display-1">Mimpy.ID</h1>
          <p class="lead">Minimize Unemployment - Platform Pencarian Lowongan Kerja untuk Mimpi Anda.</p>
          
          <div class="row text-center mb-3">
              <div class="col-md-3 offset-md-3">
                  <a href="profil.php"><button type="button" class="btn btn-primary btn-block font-weight-bold">Profil Saya</button></a>
              </div>
              <div class="col-md-3">
                  <a href="buat-loker.php"><button type="button" class="btn btn-primary btn-block font-weight-bold">Buat Loker</button></a>
              </div>
          </div>
          <div class="row text-center">
              <div class="col-md-3 offset-md-3">
                  <a href="data-loker.php">
                      <button type="button" class="btn btn-primary btn-block font-weight-bold">
                          Kelola Loker
                      </button>
                  </a>
              </div>
              <div class="col-md-3">
                  <a href="data-lamaran.php">
                      <button type="button" class="btn btn-primary btn-block font-weight-bold">
                          <?php
                          // ambil data perusahaan yg login
                          $emailPerusahaan = $_SESSION["perusahaan"];
                          $perusaahaan = mysqli_fetch_assoc(mysqli_query($db,"SELECT * from perusahaan where email = '$emailPerusahaan'"));
                          $idPerusahaan = $perusaahaan["id"];
                          // cek data lamaran
                          if (mysqli_num_rows(mysqli_query($db,"SELECT * from lamaran join loker on lamaran.idLoker = loker.id where loker.idPerusahaan = $idPerusahaan and lamaran.status = 'Menunggu'")) > 0) {
                              echo "<i class='fa fa-exclamation-circle'></i>";
                          }
                          ?>
                          Kelola Lamaran
                      </button>
                  </a>
              </div>
          </div>
      </div>
  </div>
  <!-- end jumbotron -->
<?php elseif (isset($_SESSION["pelamar"])) : ?>
  <!-- jumbotron -->
  <div class="jumbotron jumbotron-fluid bg jumbotron-index">
      <div class="container text-center">
          <h1 class="display-1">Mimpy.ID</h1>
          <p class="lead">Minimize Unemployment - Platform Pencarian Lowongan Kerja untuk Mimpi Anda.</p>
          
          <div class="row text-center mb-3">
              <div class="col-md-3 offset-md-3">
                  <a href="profil.php"><button type="button" class="btn btn-primary btn-block font-weight-bold">Profil Saya</button></a>
              </div>
              <div class="col-md-3">
                  <a href="edit-cv.php">
                      <button type="button" class="btn btn-primary btn-block font-weight-bold">
                          <?php 
                          $email = $_SESSION["pelamar"];
                          $pelamar = mysqli_fetch_assoc(mysqli_query($db,"SELECT * from pelamar where email = '$email'"));
                          if ($pelamar["cv"] == NULL) {
                              echo "<i class='fa fa-exclamation-circle'></i>  ";
                          }
                          ?>
                          CV Saya
                      </button>
                  </a>
              </div>
          </div>
          <div class="row text-center">
              <div class="col-md-3 offset-md-3">
                  <a href="data-lamaran.php">
                      <button type="button" class="btn btn-primary btn-block font-weight-bold">
                          <?php
                          $idPelamar = $pelamar["id"];
                          $lamaran = mysqli_query($db,"SELECT * FROM lamaran WHERE idPelamar = $idPelamar AND status != 'Menunggu' AND konfirmasi = 0");
                          ?>
                          <?php if(mysqli_num_rows($lamaran) > 0) : ?>
                              <i class='fa fa-exclamation-circle'></i>
                          <?php endif; ?>
                          Kelola Lamaran
                      </button>
                  </a>
              </div>
              <div class="col-md-3">
                  <a href="cari-loker.php"><button type="button" class="btn btn-primary btn-block font-weight-bold">Cari Loker Lanjutan</button></a>
              </div>
          </div>
      </div>
  </div>
  <!-- end jumbotron -->
<?php else : ?>
  <!-- jumbotron -->
  <div class="jumbotron jumbotron-fluid bg jumbotron-index">
      <div class="container text-center">
          <h1 class="display-1">Mimpy.ID</h1>
          <p class="lead">Minimize Unemployment - Platform Pencarian Lowongan Kerja untuk Mimpi Anda.</p>
          <div class="row center">
              <div class="col text-center">
                  <a href="registrasi.php" type="button" class="btn btn-primary align-content-center">Daftar Sekarang</a>
              </div>
          </div>
      </div>
  </div>
  <!-- end jumbotron -->
<?php endif; ?>