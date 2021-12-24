@extends('layouts.main')


@section('body')
    
<div class="container mt-5">
  <div class="row">
      <div class="col">
          <div class="card shadow-lg">
              <div class="card-header text-center">
                  <h3>{{ 'Position ' .$job->position . ' on ' . $job->company->name }}</h3>
              </div>
              <div class="card-body">
                  <div class="row mb-2">
                      <div class="container">
                          <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                              <div class="col-auto d-none d-lg-block">
                                  <img src="/storage/{{ $job->company->photo }}" width="200" height="205">
                              </div>
                              <div class="col p-4 d-flex flex-column position-static">
                                  <h3 class="mb-0">{{ $job->company->name }}</h3>
                                  <div class="mb-1 text-muted">{{ $job->company->address }}</div>
                                  <div class="mb-1 text-muted">{{ $job->company->email . ' | ' . $job->company->phone }}</div>
                                  <p class="card-text mb-auto">{{ $job->company->description }}</p>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-10 offset-md-1">
                          <table class="table">
                              <tr>
                                  <th>Posisi</th>
                                  <td>{{ $job->position }}</td>
                              </tr>
                              <tr>
                                  <th>Minimal Lulusan</th>
                                  <td>{{ $job->education_id }}</td>
                              </tr>
                              <tr>
                                  <th>Jobdesk</th>
                                  <td>{{ $job->jobdesk }}</td>
                              </tr>
                              <tr>
                                  <th>Keterangan</th>
                                  <td>{{ $job->description }}</td>
                              </tr>
                          </table>
                      </div>
                  </div>

                  <!-- jika login sebagai pelamar, munculkan tombol buat lamaran -->
                  @if ($job->status == 1)
                    <div class="row my-5">
                        <div class="col text-center">
                            <a href="buat-lamaran.php?id=" class="btn btn-danger btn-lg shadow-lg">Apply for a Job</a>
                        </div>
                    </div>
                  @endif
              </div>
          </div>
      </div>
  </div>
</div>

@endsection
