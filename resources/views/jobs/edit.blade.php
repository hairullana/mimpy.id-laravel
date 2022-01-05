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
        <form action="" method="POST">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Position" name="position" value="{{ $job->position }}">
            </div>
            <div class="form-group">
              <select class="form-control" name="education">
                <option value="1">No Education</option>
                <option value="2">SD</option>
                <option value="3">SMP</option>
                <option value="4">SMA/K</option>
                <option value="5">D1</option>
                <option value="6">D2</option>
                <option value="7">D3</option>
                <option value="8">D4</option>
                <option value="9">S1</option>
                <option value="10">S2</option>
                <option value="11">S3</option>
              </select>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="jobdesk" placeholder="Jobdesk" name="jobdesk">{{ $job->jobdesk }}</textarea>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="description" placeholder="Description" name="description">{{ $job->description }}</textarea>
            </div>
            <div class="form-group text-center">
              <button class="btn btn-primary">Save Changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
@endsection