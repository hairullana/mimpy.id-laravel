@extends('dashboard.layouts.main')

@section('body')
  <div class="card shadow mb-4">
    <div class="card-header text-center">
      <h3 class="">Jobs Data</h3>
    </div>
  <div class="card-body">

    {{-- alert --}}
    @if (session()->has('success'))
      <div class="text-center">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    @endif

    <!-- search -->
    <form action="/dashboard/jobs">
      <div class="row mx-5">
        <div class="col">
          <div class="form-group">
            <input class="form-control" name="search" type="search" placeholder="Keyword" value="{{ request('search') }}">
          </div>
        </div>
        <div>
          <button class="btn btn-primary" type="submit">Search</button>
        </div>
        @if (request('search'))
          <div class="col-12 text-center">
            <div class="alert alert-light" role="alert">
              Display jobs with keywords “<strong>{{ request('search') }}</strong>”
            </div>
          </div>
          @endif
      </div>
    </form>

    {{-- jobs table --}}
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Company</th>
            <th>Position</th>
            <th>Education</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($jobs as $job)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>@if(request('search')){{ $job->name }}@else{{ $job->company->name }}@endif</td>
              <td>{{ $job->position }}</td>
              <td>{{ $job->education_id }}</td>
              <td>@if($job->status) Active @else Not Active @endif</td>
              <td>
                <a href="/dashboard/jobs/@if(request('search')){{ $job->idJob }}@else{{ $job->id }}@endif" class="btn btn-outline-primary">Detail</a>
                <form action="/dashboard/jobs/@if(request('search')){{ $job->idJob }}@else{{ $job->id }}@endif" method="post">
                  @csrf
                  @method('delete')
                  <button onclick="return confirm('Are you sure?')" class="btn btn-outline-danger mt-1" type="submit">Delete</button>
                </form>
              </td>
            </tr>
          @endforeach
      </tbody>
      </table>
    </div>

    {{-- paginate --}}
    <div class="d-flex justify-content-center">
      {{ $jobs->links() }}
    </div>


  </div>
</div>
@endsection