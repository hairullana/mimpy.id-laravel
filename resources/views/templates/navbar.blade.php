<div class="row" id="up">
  <div class="col mb-5">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
      <div class="container">
        <a class="navbar-brand" href="/">Mimpy.ID</a>
        <!-- klo kecil, muncul button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto"></ul>
        <ul class="navbar-nav">
          @if(Auth::guard('admin')->check())
            <li class="nav-item"><a class="nav-link active" href="profil.php">Admin</a></li>
            <form action="/logout" method="post">
              @csrf
              <li class="nav-item"><button type="submit" class="navbar-button"><a class="nav-link active">Logout</a></button></li>
            </form>
          @elseif(Auth::guard('company')->check())
            <li class="nav-item"><a class="nav-link active" href="profil.php">{{ Auth::guard('company')->user()->name }}</a></li>
            <form action="/logout" method="post">
              @csrf
              <li class="nav-item"><button type="submit" class="navbar-button"><a class="nav-link active">Logout</a></button></li>
            </form>
          @elseif(Auth::guard('applicant')->check())
            <li class="nav-item"><a class="nav-link active" href="profil.php">{{ Auth::guard('applicant')->user()->name }}</a></li>
            <form action="/logout" method="post">
              @csrf
              <li class="nav-item"><button type="submit" class="navbar-button"><a class="nav-link active">Logout</a></button></li>
            </form>
          @else
            <li class="nav-item"><a class="nav-link active" href="/register">Register</a></li>
            <li class="nav-item"><a class="nav-link active" href="/login">Login</a></li>
          @endif
        </ul>
      </div>
    </nav>
  </div>
</div>