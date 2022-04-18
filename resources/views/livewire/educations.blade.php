<div>
  <livewire:education-create></livewire:education-create>
  
  {{-- <a href="/dashboard/educations/create" class="btn btn-primary">Create New Education</a> --}}
  
  {{-- educations data table --}}
  <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>ID</th>
          <th>Education Name</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <ul>
          @foreach ($educations as $education)
            <tr>
              <td>{{ $education->id }}</td>
              <td>{{ $education->name }}</td>
              <td>
                <a href="/dashboard/educations/{{ $education->id }}/edit" class="btn btn-outline-primary">Edit</a>
                <form action="/dashboard/educations/{{ $education->id }}" method="post" class="d-inline">
                  @csrf
                  @method('delete')
                  <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-outline-danger" disabled>Delete</button>
                </form>
              </td>
            </tr>
          @endforeach
        </ul>
      </tbody>
    </table>
  </div>
</div>