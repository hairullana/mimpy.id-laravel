@extends('layouts.main')

@section('body')
<div class="container justify-content-center d-flex mt-5">
  <div class="card shadow-lg col-md-8">
    <div class="card-header text-center">
      <h3>Edit CV</h3>
    </div>
    <div class="card-body">

      {{-- alert --}}
      <div class="row justify-content-center d-flex">
        <div class="col-md-8">
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
      
      @if (Auth::guard('applicant')->user()->cv)
        <p><a href="/storage/{{ Auth::guard('applicant')->user()->cv }}">Download My CV</a></p>
      @else
        <p class="text-danger">*You haven't uploaded your cv</p>
      @endif

      <!-- form upload -->
      <form action="/cv" method="POST" enctype="multipart/form-data">
        @csrf

        @if (Auth::guard('applicant')->user()->cv)
          <input type="hidden" value="{{ Auth::guard('applicant')->user()->cv }}" name="oldCV">
        @endif

        <span>File : <i>jpg, jpeg, png, pdf, doc, docx</i></span>
        <div class="input-group">
          <div class="custom-file">
              <input type="file" name="cv" class="custom-file-input @error('cv') is-invalid @enderror" id="cv">
              <label class="custom-file-label" for="cv">Upload CV</label>
          </div>
          <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit">Save Change</button>
          </div>
        </div>
        @error('cv')
          <div class="small text-danger ml-2">
            {{ $message }}
          </div>
        @enderror
      </form>
    </div>
  </div>
</div>
@endsection