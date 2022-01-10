@extends('layouts.main')

@section('body')
<div class="container mt-5">
  <div class="card shadow-lg">
    <div class="card-header text-center">
      <h3>Send Letter to Applicant</h3>
    </div>
    <div class="card-body">
      <!-- kirim pesan kepada pelamar -->
      <form action="/company/applications/accept" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $application->id }}">
        {{-- <div class="input-group"> --}}
          <input id="company_letter" name="company_letter" type="hidden" value="">
          <trix-editor input="company_letter"></trix-editor>
          {{-- <textarea style="height:300px;" class="form-control" name="company_letter" cols="30" rows="10" required>Kepada yth.&#13;Saudara {{ $application->applicant->name }}&#13;Di {{ $application->job->company->address }}&#13;&#13;Dengan hormat,&#13;Sehubungan dengan lamaran yang telah diajukan saudari dan kami terima pada tanggal {{ date_format($application->created_at, 'd F Y') }} maka saudara dinyatakan memenuhi syarat administrasi sebagai pelamar kerja di perusahaan kami dan kami mengharapkan kedatangan saudari untuk melakukan tes wawancara kerja di perusahaan kami. Oleh karenanya diharapkan kedatangan saudari di Kantor Pusat pada:&#13;&#13;Hari dan tanggal : &#13;Waktu                  : &#13;Tempat                : &#13;&#13;Demikian surat ini kami sampaikan. Atas partisipasi dan kedatangan saudari kami mengucapkan terimakasih.&#13;</textarea> --}}
        {{-- </div> --}}
        <div class="form-group mt-3">
          <button type="submit" class="btn btn-primary">Send Letter</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  document.addEventListener('trix-file-accept', function(e){
    e.preventDefault();
  })
</script>
@endsection