@extends('layouts.main')

@section('body')
  <div class="container">
    <div class="card mt-5 shadow-lg">
      <div class="card-header text-center">
        <h3>Find Spesific Job Vacancies</h3>
      </div>
      <div class="card-body col-md-8 offset-md-2 text-center">
        <p class="text-danger font-weight-bold">*Leave the form blank if you want to find all types of job vacancies</p>
        <div class="row center">
          <div class="col text-center mt-2">

            {{-- form search --}}
            <form action="search">
              <div class="form-row">
                <div class="form-group col-md-4 mb-3">
                  <input type="text" name="city" class="form-control" placeholder="City" value="{{ request('city') }}">
                </div>
                <div class="form-group col-md-4 mb-3">
                  <input type="text" name="position" class="form-control" placeholder="Position" value="{{ request('position') }}">
                </div>
                <div class="form-group col-md-4 mb-3">
                  <select class="form-control" name="education">
                    <option value="">Select Education</option>
                    @foreach ($educations as $education)
                      <option value="{{ $education->id }}" @if(request('education') == $education->id) selected @endif>{{ $education->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <button type="cari" class="btn btn-primary align-content-center">Find Job</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  @if(request('city') || request('position') || request('education'))
    <div class="container mt-4">
      <div class="row mb-4">
        <div class="col-md-8 offset-md-2 text-center">
          <div class="alert alert-primary">
            @if (request('city') && request('position') && request('education'))
              Display <strong>{{ $jobs->total() }}</strong> job vacancies with minimum education <strong>{{ App\Models\Education::find(request('education'))->name }}</strong>, position as a <strong>{{ request('position') }}</strong> in <strong>{{ request('city') }}</strong>.
            @elseif (request('city') && request('position'))
              Display <strong>{{ $jobs->total() }}</strong> job vacancies with position as a <strong>{{ request('position') }}</strong> in <strong>{{ request('city') }}</strong>.
            @elseif (request('city') && request('education'))
              Display <strong>{{ $jobs->total() }}</strong> job vacancies with minimum education <strong>{{ App\Models\Education::find(request('education'))->name }}</strong> in <strong>{{ request('city') }}</strong>.
            @elseif (request('position') && request('education'))
              Display <strong>{{ $jobs->total() }}</strong> job vacancies with minimum education <strong>{{ App\Models\Education::find(request('education'))->name }}</strong>, position as a <strong>{{ request('position') }}</strong>.
            @elseif (request('city'))
              Display <strong>{{ $jobs->total() }}</strong> job vacancies in <strong>{{ request('city') }}</strong>.
            @elseif (request('position'))
              Display <strong>{{ $jobs->total() }}</strong> job vacancies with position as a <strong>{{ request('position') }}</strong>.
            @elseif (request('education'))
              Display <strong>{{ $jobs->total() }}</strong> job vacancies with minimum education <strong>{{ App\Models\Education::find(request('education'))->name }}</strong>.
            @endif
          </div>
        </div>
      </div>

      <!-- list loker -->
      <div class="row mb-2">
        @foreach ($jobs as $job)
          <div class="col-md-6 mb-2">
            <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative" style="height:17rem">
              <div class="col-auto d-none d-lg-block">
                <img src="/storage/@if(request('search')){{ $job->photo }}@else{{ $job->company->photo }}@endif" width="200" height="205" alt="">
              </div>
              <div class="col p-4 d-flex flex-column position-static">
                <h3 class="mb-0">@if(!request('search')) {{ $job->position . ' | ' . $job->company->name }} @else {{ $job->job->position . ' | ' . $job->company->name }} @endif</h3>
                <div class="mb-1 text-muted">@if(request('search')) {{ $job->address }} @else {{ $job->company->address }} @endif</div>
                <p class="card-text mb-auto">{{ $job->jobdesk }}</p>
                <a href="/jobs/@if(request('search')){{ $job->idJob }}@else{{ $job->id }}@endif" class="stretched-link">read more</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>

      {{-- paginate --}}
      <div class="d-flex justify-content-center">
        {{ $jobs->appends(request()->all())->links() }}
      </div>
    </div>
  @endif
@endsection