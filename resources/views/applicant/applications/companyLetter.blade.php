@extends('layouts.main')

@section('body')
  <div class="container justify-content-center d-flex">
    <div class="card shadow-lg mt-5 col-md-10">
      <div class="card-header text-center">
          <h3>Letter from Company</h3>
      </div>
      <div class="card-body p-5">
        {!! $letter->company_letter !!}

        <div class="justify-content-end d-flex mt-5">
          <a href="/applicant/applications" class="btn btn-success">Back To Applications</a>
        </div>
      </div>
    </div>
  </div>
@endsection