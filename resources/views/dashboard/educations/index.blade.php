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

    
    <livewire:education-create></livewire:education-create>
    {{-- <a href="/dashboard/educations/create" class="btn btn-primary">Create New Education</a> --}}

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
          <livewire:educations></livewire:educations>
        </tbody>
      </table>
    </div>

  </div>
</div>
@endsection