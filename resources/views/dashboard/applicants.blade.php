@extends('dashboard.layouts.main')

@section('body')
  <div class="card shadow mb-4">
    {{-- title --}}
    <div class="card-header text-center">
        <h3>Applicants Data</h3>
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

      <!-- search -->
      <form action="/dashboard/applicants">
        <div class="row mx-5 mb-4">
          <div class="col">
            <input class="form-control" name="search" type="search" placeholder="Keyword" value="{{ request('search') }}">
          </div>
          <div>
            <button class="btn btn-primary" type="submit">Search</button>
          </div>

          {{-- alert --}}
          @if (request('search'))
          <div class="col-12 text-center">
            <div class="alert alert-light" role="alert">
              Display applicants with keywords “<strong>{{ request('search') }}</strong>”
            </div>
          </div>
          @endif
        </div>
      </form>

      {{-- applicants data --}}
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr> 
              <th>No</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Address</th>
              <th>CV</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($applicants as $applicant)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $applicant->name }}</td>
                <td>{{ $applicant->email }}</td>
                <td>{{ $applicant->phone }}</td> 
                <td>{{ $applicant->address }}</td>
                <td><a href="/assets/cv/">CV</a></td>
                <td>
                  <a href="/dashboard/applicants/{{ $applicant->id }}" class="btn btn-outline-primary btn-block">Detail</a>
                  <form action="/dashboard/applicants/{{ $applicant->id }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-outline-danger btn-block mt-1">Delete</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      {{-- paginate --}}
      <div class="d-flex justify-content-center">
        {{ $applicants->appends(request()->all())->links() }}
      </div>

    </div>
  </div>
@endsection