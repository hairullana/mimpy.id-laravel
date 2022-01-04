@extends('dashboard.layouts.main')

@section('body')
  <div class="card">
    
    {{-- title --}}
    <div class="card-header text-center">
      <h3>Application Detail</h3>
    </div>

    {{-- body --}}
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
      <p><a href="assets/cv/" class="btn btn-primary">Selengkapnya Lihat CV</a></p>

      <!-- surat lamaran -->
      <div class="mt-5">
        <h5>Surat Lamaran</h5>
        {{ $application->applicant_letter }}
      </div>
    </div>
  </div>
@endsection