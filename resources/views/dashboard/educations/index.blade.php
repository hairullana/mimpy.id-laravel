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
    {{-- @if (session()->has('success'))
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
    @endif --}}

    
    <livewire:educations></livewire:educations>

  </div>
</div>
@endsection