<div>
  <div class="card-body">
  
    <form action="/dashboard/educations" method="POST">
      @csrf
      <div class="form-group row">

        @error('name')
          <div class="small text-danger ml-2">
            {{ $message }}
          </div>
        @enderror
        <div class="col-md-6 col-sm-6">
          <div class="input-group">
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Education Name" required>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <button type="submit" class="btn btn-primary btn-block">Save</button></a>
        </div>
      </div>
    </form>

  </div>
</div>
