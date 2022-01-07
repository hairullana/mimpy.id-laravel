@extends('layouts.main')

@section('body')
  <div class="container mt-5">
    <div class="card shadow-lg">

      {{-- title --}}
      <div class="card-header text-center">
        <h3>Manage Job Vacancies</h3>
      </div>

      {{-- body --}}
      <div class="card-body">
          
        <!-- search -->
        <form action="/jobs">
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

        {{-- alert --}}
        <div class="row justify-content-center d-flex">
          <div class="col-md-4">
            @if (session()->has('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif
          </div>
        </div>

        {{-- data --}}
        <table class="table text-center">
          <tr>
            <th>No</th>
            <th>Position</th>
            <th>Education</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
          @foreach ($jobs as $job)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $job->position }}</td>
              <td>{{ $job->education }}</td>
              <td>@if($job->status) Active @else Not Active @endif</td>
              <td>
                <a href="/jobs/{{ $job->id }}" class="btn btn-outline-primary">Detail</a>
                <a href="/jobs/{{ $job->id }}/edit" class="btn btn-outline-success">Edit</a>
                <form action="/jobs/{{ $job->id }}" method="post" class="d-inline-block">
                  @csrf
                  @method('delete')
                  <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-outline-danger">Delete</button>
                </form>
                @if ($job->status)
                  <a href="jobs/{{ $job->id }}/close" onclick="return confirm('Are you sure?')" class="btn btn-outline-warning">Close Job</a>
                @endif
              </td>
            </tr>
          @endforeach
        </table>

      </div>

      {{-- paginate --}}
      <div class="d-flex justify-content-center">
        {{ $jobs->appends(request()->all())->links() }}
      </div>


    </div>
  </div>
@endsection