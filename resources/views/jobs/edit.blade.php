@extends('layouts.main')

@section('body')

  <div class="container mt-5 justify-content-center d-flex">
    <div class="card shadow-lg col-lg-10">
      {{-- title --}}
      <div class="card-header text-center">
          <h3>Edit Job</h3>
      </div>
  
      {{-- body --}}
      <div class="card-body">
  
        {{-- form --}}
        <form action="/jobs/{{ $job->id }}" method="POST">
          @csrf
          @method('put')
          <div class="form-group">
            <input type="text" class="form-control @error('position') is-invalid @enderror" placeholder="Position" name="position" value="{{ old('position', $job->position) }}">
            @error('position')
              <div class="small text-danger ml-2">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <select class="form-control @error('education_id') is-invalid @enderror" name="education_id">
              @foreach ($educations as $education)
                @if ($job->education_id == $education->id)
                  <option value="{{ $education->id }}" selected>{{ $education->name }}</option>
                @else
                  <option value="{{ $education->id }}">{{ $education->name }}</option>
                @endif
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <textarea class="form-control @error('jobdesk') is-invalid @enderror" name="jobdesk" placeholder="Jobdesk" name="jobdesk">{{ old('jobdesk', $job->jobdesk) }}</textarea>
          </div>
          <div class="form-group">
            <textarea class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Description" name="description">{{ old('description', $job->description) }}</textarea>
          </div>
          <div class="form-group text-center">
            <button class="btn btn-primary">Save Changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection