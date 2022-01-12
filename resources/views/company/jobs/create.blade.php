@extends('layouts.main')

@section('body')
  <div class="container mt-5 justify-content-center d-flex">
    <div class="card col-md-8 shadow-lg">
      <div class="card-header text-center">
        <h3>Create Job Vacancy</h3>
      </div>
      <div class="card-body">
        <form action="/company/jobs" method="POST">
          @csrf
          <div class="form-group">
            <input type="text" class="form-control @error('position') is-invalid @enderror" placeholder="Position" name="position" required>
            @error('position')
              <div class="small text-danger ml-2">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <select class="form-control @error('education_id') is-invalid @enderror" name="education_id">
              @foreach ($educations as $education)
                <option value="{{ $education->id }}">{{ $education->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <textarea class="form-control @error('jobdesk') is-invalid @enderror" name="jobdesk" placeholder="Jobdesk" name="jobdesk" required></textarea>
          </div>
          <div class="form-group">
            <textarea class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Description" name="description" required></textarea>
          </div>
          <div class="form-group text-center">
            <button class="btn btn-primary" type="submit">Publish</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection