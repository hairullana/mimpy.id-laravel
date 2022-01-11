@extends('dashboard.layouts.main')

@section('body')
  <div class="card shadow mb-4">

    {{-- title --}}
    <div class="card-header text-center">
      <h3 class="">Applications Data</h3>
    </div>

    {{-- body --}}
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

      {{-- search --}}
      <form action="/dashboard/applications">
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
              Display applications with keywords “<strong>{{ request('search') }}</strong>”
            </div>
          </div>
          @endif
        </div>
      </form>

      {{-- applications table --}}
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Applicant</th>
              <th>Company</th>
              <th>Position</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody> 
            @foreach ($applications as $application)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $application->applicant->name }}</td>
                <td>{{ $application->job->company->name }}</td>
                <td>{{ $application->job->position }}</td>
                <td>
                  @if ($application->status == -1)
                    Waiting
                  @elseif ($application->status == 0)
                    Rejected
                  @elseif ($application->status == 1)
                    Accepted
                  @endif
                </td>
                <td>
                  <a href="/dashboard/applications/{{ $application->id }}" class="btn btn-outline-primary">Detail</a>
                  <form action="/dashboard/applications/{{ $application->id }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-outline-danger mt-2">Delete</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      {{-- paginate --}}
      <div class="d-flex justify-content-center">
        {{ $applications->appends(request()->all())->links() }}
      </div>

    </div>
  </div>
@endsection