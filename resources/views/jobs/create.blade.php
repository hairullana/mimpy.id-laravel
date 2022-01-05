@extends('layouts.main')

@section('body')
  <div class="container mt-5 justify-content-center d-flex">
    <div class="card col-md-8 shadow-lg">
      <div class="card-header text-center">
        <h3>Create Job Vacancy</h3>
      </div>
      <div class="card-body">
        <form action="/jobs" method="POST">
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
              <option value="0" selected>No Education</option>
              <option value="1">SD</option>
              <option value="2">SMP</option>
              <option value="3">SMA/K</option>
              <option value="4">D1</option>
              <option value="5">D2</option>
              <option value="6">D3</option>
              <option value="7">D4</option>
              <option value="8">S1</option>
              <option value="9">S2</option>
              <option value="10">S3</option>
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