<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- judul -->
  <title>{{ $title }} | Mimpy.ID</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <!-- My CSS -->
  <link rel="stylesheet" href="/css/style.css">
  <!-- Sweetalert2 -->
  <link rel="stylesheet" href="assets/sweetalert2/sweetalert2.min.css">
  <!-- Sweetalert2 JS -->
  <script src="assets/sweetalert2/sweetalert2.min.js"></script>

  <!-- Favicon -->
  <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
  <link rel="icon" href="assets/favicon.ico" type="image/x-icon">

  <!-- Fontawesome -->
  <script src="https://kit.fontawesome.com/ac1ee11f2c.js" crossorigin="anonymous"></script>
</head>
<body>

    @include('templates.navbar')

    @yield('body')


    {{-- <?php if (!isset($_POST["cari"])) : ?>
      <!-- pagination -->
      <div class="row">
          <div class="col">
              <nav aria-label="...">
                  <ul class="pagination justify-content-center">
                      <li class="page-item">
                          <?php if( $halamanAktif > 1 ) : ?>
                              <a class="page-link" href="?page=<?= $halamanAktif - 1; ?>"><i class="fa fa-chevron-left"></i></a>
                          <?php endif; ?>
                      </li>
                      <?php for( $i = 1; $i <= $jumlahHalaman; $i++ ) : ?>
                          <?php if( $i == $halamanAktif ) : ?>
                              <li class="page-item active">
                                  <a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a>
                              </li>
                          <?php else : ?>
                              <li class="page-item">
                                  <a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a>
                              </li>   
                          <?php endif; ?>
                      <?php endfor; ?>
                      <li class="page-item">
                          <?php if( $halamanAktif < $jumlahHalaman ) : ?>
                              <a class="page-link" href="?page=<?= $halamanAktif + 1; ?>"><i class="fa fa-chevron-right"></i></a>
                          <?php endif; ?>
                      </li>
                  </ul>
              </nav>
          </div>
      </div>
      <!-- end pagination -->
    <?php endif; ?> --}}


    @include('templates.footer')
</body>
</html>