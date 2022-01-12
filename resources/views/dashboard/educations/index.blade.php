@extends('dashboard.layouts.main')

@section('body')
<div class="card shadow mb-4">

  {{-- title --}}
  <div class="card-header text-center">
    <h3 class="">Manage Educations</h3>
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
    @else
      <div class="text-center">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          Delete education feature is not yet available
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    @endif

    <div class="my-3">
      <a href="/dashboard/educations/create" class="btn btn-primary">Create New Education</a>
    </div>

    {{-- educations data table --}}
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>Education Name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($educations as $education)
            <tr>
              <td>{{ $education->id }}</td>
              <td>{{ $education->name }}</td>
              <td>
                <a href="/dashboard/educations/{{ $education->id }}/edit" class="btn btn-outline-primary">Edit</a>
                <form action="/dashboard/educations/{{ $education->id }}" method="post" class="d-inline">
                  @csrf
                  @method('delete')
                  <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-outline-danger" disabled>Delete</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

  </div>
</div>
@endsection