{{-- {{ Auth::guard('applicant')->user()->name;die; }} --}}

@extends('layouts.main')

@section('body')

<div class="jumbotron jumbotron-fluid bg jumbotron-index">
    <div class="container text-center">
        <h1 class="display-1">Mimpy.ID</h1>
        <p class="lead">Minimize Unemployment - Platform Pencarian Lowongan Kerja untuk Mimpi Anda.</p>
        
        <div class="row text-center mb-3">

          @if (Auth::guard('admin')->check())
            <div class="col-md-3 offset-md-3">
              <a href="/profile"><button type="button" class="btn btn-primary btn-block font-weight-bold">Profil Admin</button></a>
            </div>
            <div class="col-md-3">
              <a href="dashboard.php"><button type="button" class="btn btn-primary btn-block font-weight-bold">Dashboard Admin</button></a>
            </div>
          @elseif (Auth::guard('company')->check())
            <div class="col-12">
              <div class="row text-center mb-3">
                <div class="col-md-3 offset-md-3">
                  <a href="/profile"><button type="button" class="btn btn-primary btn-block font-weight-bold">Profil Saya</button></a>
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
                      $idCompany = Auth::guard('company')->user()->id;
                      $activeApplication = DB::table('applications')
                              ->join('jobs', 'applications.job_id', '=', 'jobs.id')
                              ->where('applications.status', '=', -1)
                              ->where('jobs.company_id', '=', $idCompany)
                              ->get();                    
                      ?>
                      @if (!empty($activeApplication))
                        <i class='fa fa-exclamation-circle'></i>
                      @endif
                      Kelola Lamaran
                    </button>
                  </a>
                </div>
              </div>
            </div>
          @elseif (Auth::guard('applicant')->check())
            <div class="col-md-3 offset-md-3">
              <a href="/profile"><button type="button" class="btn btn-primary btn-block font-weight-bold">Profil Saya</button></a>
            </div>
            <div class="col-md-3">
              <a href="edit-cv.php">
                <button type="button" class="btn btn-primary btn-block font-weight-bold">
                  @if (Auth::guard('applicant')->user()->cv == '')
                    <i class='fa fa-exclamation-circle'></i>
                  @endif
                  CV Saya
                </button>
              </a>
            </div>
          @else
            <div class="col text-center">
                <a href="registrasi.php" type="button" class="btn btn-primary align-content-center">Daftar Sekarang</a>
            </div>
          @endif

        </div>
    </div>
  </div>

  <!-- tampilan loker -->
  <div class="container">

    <!-- heading -->
    <div class="row">
      <div class="col text-center">
        <h1 class="display3 mb-4">Daftar Lowongan Kerja</h1>
      </div>
    </div>
    <!-- end heading -->

    <!-- search -->
    <form action="/">
      <div class="row mx-5 mb-4">
        <div class="col">
          <input class="form-control" name="search" type="search" placeholder="Keyword" aria-label="Search"  value="{{ request('search') }}">
        </div>
        <div>
          <button class="btn btn-primary" type="submit">Search</button>
        </div>
        @if (request('search'))
        <div class="col-12 text-center">
          <div class="alert alert-light" role="alert">
            Display job vacancies with keywords “<strong>{{ request('search') }}</strong>”
          </div>
        </div>
        @endif
      </div>
    </form>
    <!-- end search -->


    <!-- list loker -->
    <div class="row mb-2">
        @foreach ($jobs as $job)
          <div class="col-md-6 mb-2">
            <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
              <div class="col-auto d-none d-lg-block">
                <img src="/images/company/@if(request('search')){{ $job->photo }}@else{{ $job->company->photo }}@endif" width="200" height="205" alt="">
              </div>
              <div class="col p-4 d-flex flex-column position-static">
                <h3 class="mb-0">@if(request('search')) {{ $job->name }} @else {{ $job->company->name }} @endif</h3>
                <div class="mb-1 text-muted">@if(request('search')) {{ $job->address }} @else {{ $job->company->address }} @endif</div>
                <p class="card-text mb-auto">{{ $job->jobdesk }}</p>
                <a href="detail-loker.php?id=" class="stretched-link">read more</a>
              </div>
            </div>
          </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center">
      {{ $jobs->links() }}
    </div>
  </div>
@endsection