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
  
  <div class="row">
    <div class="col-8">
      <input wire:model="search" type="text" class="form-control form-control-sm" placeholder="Search">
    </div>
    <div class="col-4">
      <select wire:model="paginate" name="" id="" class="form-control form-control-sm w-auto">
        <option value="5">5</option>
        <option value="10">10</option>
        <option value="15">15</option>
      </select>
    </div>
  </div>
  
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

    <div class="d-flex justify-content-center">
      {{ $educations->links() }}
    </div>
  </div>
</div>