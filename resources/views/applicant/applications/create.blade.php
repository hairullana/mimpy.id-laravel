@extends('layouts.main')

@section('body')
<div class="container">
  <div class="card mt-5 shadow-lg">
    <div class="card-header text-center">
      <h3>Apply for Position {{ $job->position }} on {{ $job->company->name }}</h3>
    </div>
    <div class="card-body">
      <form action="/applicant/applications" method="POST">
        @csrf
        <input type="hidden" value="{{ $job->id }}" name="job_id">
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">Rp. </div>
            </div>
            <input type="text" class="form-control @error('salary') is-invalid @enderror" name="salary" placeholder="Salary Negotiate" required>
          </div>
          @error('salary')
            <div class="small text-danger ml-2">
              {{ $message }}
            </div>
          @enderror
        </div>
        <input id="applicant_letter" name="applicant_letter" type="hidden" value="">
        <trix-editor input="applicant_letter"></trix-editor>
        {{-- <div class="form-group">
          <textarea name="applicant_letter" style="height:300px;" class="form-control" required>
            Kepada Yth. Bapak/ Ibu Pimpinan {{ $job->company->name }}&#13;Dengan hormat,&#13;&#13;Dengan ini saya, {{ Auth::guard('applicant')->user()->name }} ingin mengajukan lamaran kerja di {{ $job->company->name }} sebagai “{{ $job->position }}”.&#13;Saya memiliki semangat kerja yang tinggi dan ingin berkembang.&#13;Saya siap untuk memberikan kompensasi waktu dan tenaga saya apabila diperlukan dan sangat besar harapan saya agar dapat diberikan kesempatan wawancara.&#13;Sebagai bahan pertimbangan, bersama ini saya lampirkan Dokumen Curriculum Vitae (CV).&#13;Terima Kasih.
          </textarea>
        </div> --}}
        <div class="row justify-content-end d-flex mt-2">
          <div class="col-md-4">
            <button type="submit" class="btn btn-primary btn-block">Submit Application</button></a>
            <br>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection