@extends('dashboard.layouts.main')

@section('body')
  <div class="card shadow mb-4">

    {{-- title --}}
    <div class="card-header text-center">
      <h3 class="">Companies Data</h3>
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
      <form action="/dashboard/companies">
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
              Display companies with keywords “<strong>{{ request('search') }}</strong>”
            </div>
          </div>
          @endif
        </div>
      </form>

      {{-- companies data table --}}
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>E-mail</th>
              <th>Phone Number</th>
              <th>City</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($companies as $company)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $company->name }}</td>
                <td>{{ $company->email }}</td>
                <td>{{ $company->phone }}</td>
                <td>{{ $company->city }}</td>
                <td>
                  <a href="/dashboard/companies/{{ $company->id }}" class="btn btn-outline-primary btn-block">Detail</a>
                  <form action="/dashboard/companies/{{ $company->id }}" method="post">
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

      <div class="d-flex justify-content-center">
        {{ $companies->links() }}
      </div>

    </div>
  </div>
@endsection