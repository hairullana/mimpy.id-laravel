@extends('layouts.main')

@section('body')

  @include('templates.jumbotron')

  <!-- tampilan loker -->
  <div class="container">

    <!-- heading -->
    <div class="row">
      <div class="col text-center">
        <h1 class="display3 mb-4">Job Vacancies</h1>
      </div>
    </div>
    <!-- end heading -->

    <!-- search -->
    <form>
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
      {{-- {{ var_dump($job->idJob) }} --}}
          <div class="col-md-6 mb-2">
            <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative" style="height:17rem">
              <div class="col-auto d-none d-lg-block">
                <img src="/storage/{{ $job->company->photo }}" width="200" height="205" alt="">
              </div>
              <div class="col p-4 d-flex flex-column position-static">
                <h3 class="mb-0">{{ $job->position . ' at ' . $job->company->name }} </h3>
                <div class="mb-1 text-muted">{{ $job->company->address }} </div>
                <p class="card-text mb-auto">{{ $job->jobdesk }}</p>
                <a href="/jobs/{{ $job->id }}" class="stretched-link">read more</a>
              </div>
            </div>
          </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center">
      {{ $jobs->appends(request()->all())->links() }}
    </div>
  </div>
@endsection