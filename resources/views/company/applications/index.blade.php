@extends('layouts.main')

@section('body')
  <div class="container mt-5">
    <div class="card">
      <div class="card-header text-center">
        <h3>Manage Applicants</h3>
      </div>
      <div class="card-body">

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

          
        <!-- search -->
        <form action="/company/applications">
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

        <!-- data pelamar -->
        <table class="table text-center">
          <tr>
            <th>No</th>
            <th>Applicant</th>
            <th>Position</th>
            <th>Detail</th>
            <th>Action</th>
          </tr>
          @foreach ($applications as $application)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $application->applicant->name }}</td>
              <td>{{ $application->job->position }}</td>
              <td>
                @if ($application->cv)
                  <a href="/storage/{{ $application->applicant->cv }}" class="btn btn-outline-primary">CV</a> 
                @else
                  <button disabled class="btn btn-outline-secondary">No CV</button> 
                @endif
                <a href="/company/applications/{{ $application->id }}" class="btn btn-outline-primary">Application Letter</a></td>
              <td>
                @if ($application->status == -1)
                  <a href="/company/applications/{{ $application->id }}/accept" onclick="return confirm('Are you sure to accept this application?')" class="btn btn-outline-success">Accept<a> 
                    <a href="/company/applications/{{ $application->id }}/reject" onclick="return confirm('Are you sure to reject this application?')" class="btn btn-outline-danger">Reject<a>
                @elseif ($application->status == 0)
                  Rejected
                @elseif ($application->status == 1)
                  Accepted
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