@extends('layouts.main')

@section('body')
  <div class="container mt-5">
    <div class="card">
      <div class="card-header text-center">
        <h3>Manage Applicants</h3>
      </div>
      <div class="card-body">
          
        <!-- search -->
        <form action="/applicants">
          <div class="row mx-5 mb-4">
            <div class="col">
              <input class="form-control" name="search" type="search" placeholder="Keyword" value="{{ request('search') }}">
            </div>
            <div>
              <button class="btn btn-primary" type="submit">Search</button>
            </div>
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
              <td>{{ $application->applicant }}</td>
              <td>{{ $application->position }}</td>
              <td><a href="" class="btn btn-outline-primary">CV</a> <a href="" class="btn btn-outline-primary">Application Letter</a></td>
              <td>
                @if ($application->status == -1)
                  <a href="" onclick="return confirm('Are you sure to accept this application?')" class="btn btn-outline-success">Accept<a> <a href="" onclick="return confirm('Are you sure to reject this application?')" class="btn btn-outline-danger">Reject<a>
                @elseif ($application->status == 0)
                  Rejected
                @elseif ($application->status == 1)
                  Accepted
                @endif
              </td>
            </tr>
          @endforeach
        </table>

      </div>
    </div>
  </div>
@endsection