<div>
  <form wire:submit.prevent="update">
    @error('name')
      <div class="small text-danger ml-2 mb-2">
        {{ $message }}
      </div>
    @enderror
    <div class="form-group row">
      <input type="hidden" name="" wire:model="educationId">
      <div class="col-8">
        <div class="input-group">
          <input wire:model="name" type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name" placeholder="Education Name" required>
        </div>
      </div>
      <div class="col-4">
        <button type="submit" class="btn btn-primary btn-sm btn-block w-auto">Save</button></a>
      </div>
    </div>
  </form>
</div>
