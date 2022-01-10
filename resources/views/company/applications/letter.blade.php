@extends('layouts.main')

@section('body')
  <div class="container mt-5 ">
    <div class="card shadow-lg">
        <div class="card-header text-center">
            <h3>Application Detail</h3>
        </div>
        <!-- biodata singkat -->
        <div class="card-body">
            <p>Date : {{ date_format($application->created_at, 'd F Y') }}</p>
            <p>Applicant : {{ $application->applicant->name }}</p>
            <p>Company : {{ $application->job->company->name }}</p>
            <p>Position : {{ $application->job->position }}</p>
            <p>
              Status :
              @if ($application->status == -1)
                Waiting
              @elseif ($application->status == 0)
                Rejected
              @elseif ($application->status == 1)
                Accepted
              @endif
            </p>
            <p><a href="/storage/{{ $application->applicant->cv }}" class="btn btn-primary">Curriculum Vitae</a></p>

            <!-- surat lamaran -->
            <div class="mt-5">
                <h5>Appplication Letter</h5>
                <p>
                  {!! $application->applicant_letter !!}
                </p>
            </div>
        </div>
    </div>
  </div>
@endsection