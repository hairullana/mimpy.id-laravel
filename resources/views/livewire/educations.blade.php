<div>
  @if (session()->has('message'))
    <div class="text-center">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
  </div>
  @endif

  @if ($statusUpdate)
    <livewire:education-update></livewire:education-update>
  @else
    <livewire:education-create></livewire:education-create>
  @endif
  
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
                <button wire:click="getEducation({{ $education->id }})" class="btn btn-outline-primary">Edit</button>
                @if (App\Models\Job::where('education_id', $education->id)->get()->count() > 0)
                  <button wire:click="destroy({{ $education->id }})" class="btn btn-outline-primary" disabled>Delete</button>
                @else
                  <button wire:click="destroy({{ $education->id }})" class="btn btn-outline-primary">Delete</button>
                @endif
              </td>
            </tr>
          @endforeach
        </ul>
      </tbody>
    </table>
  </div>
</div>