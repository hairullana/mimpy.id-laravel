@extends('dashboard.layouts.main')

@section('body')
<div class="container justify-content-center d-flex">
  <div class="card shadow mb-4 col-8">
  
    {{-- title --}}
    <div class="card-header text-center">
      <h3 class="">Manage Educations</h3>
    </div>
  
    <div class="text-center m-3">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        Make sure the education level is higher than <strong>{{ $education->name }}</strong>
        <br>Or you can edit the name of education first so that it is sorted
      </div>
    </div>
  
    {{-- body --}}
    <div class="card-body">
  
      <form action="/dashboard/educations" method="POST">
        @csrf
        <div class="form-group">
          <div class="input-group">
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Education Name" required>
          </div>
          @error('name')
            <div class="small text-danger ml-2">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="row justify-content-end d-flex mt-2">
          <div class="col-md-4">
            <button type="submit" class="btn btn-primary btn-block">Save</button></a>
            <br>
          </div>
        </div>
      </form>
  
    </div>
  </div>
</div>
@endsection