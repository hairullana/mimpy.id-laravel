@extends('layouts.main')

@section('body')
  <div class="container mt-5">
    <div class="card">

      {{-- title --}}
      <div class="card-header text-center">
        <h3>Manage Applications</h3>
      </div>

      {{-- body --}}
      <div class="card-body">
          
        <!-- search -->
        <form action="/applicant/applications">
          <div class="row mx-5 mb-4">
            <div class="col">
              <input class="form-control" name="search" type="search" placeholder="Keyword" value="{{ request('search') }}">
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

        {{-- applications --}}
        <table class="table text-center">
          <tr>
            <th>No</th>
            <th>Company</th>
            <th>Position</th>
            <th>Salary</th>
            <th>Detail</th>
            <th>Status</th>
            <th>Confirmation</th>
          </tr>
          @foreach ($applications as $application)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $application->job->company->name }}</td>
              <td>{{ $application->job->position }}</td>
              <td>Rp. {{ number_format($application->salary) }}</td>
              <td><a href="/applicant/applications/{{ $application->id }}">Application Letter</a></td>
              <td>
                @if ($application->status == -1)
                  Waiting
                @elseif ($application->status == 0)
                  Rejected
                @elseif ($application->status == 1)
                  <a href="/applicant/applications/{{ $application->id }}">Accepted</a>
                @endif
              </td>
              <td>
                @if ($application->confirm == 0 && $application->status > -1)
                  <a href="/applicant/applications/{{ $application->id }}/confirm" class="btn btn-primary" onclick="return confirm('Are you sure?')">Confirm</a>
                @elseif ($application->status == -1)
                  <button class="btn btn-secondary" disabled>Confirm</button>
                @elseif ($application->confirm == 1)
                  <i class="fa fa-check-circle"></i>
                @endif
              </td>
            </tr>
          @endforeach
        </table> 

        {{-- paginate --}}
        <div class="d-flex justify-content-center">
          {{ $applications->appends(request()->all())->links() }}
        </div>

      </div>
    </div>
  </div>
@endsection