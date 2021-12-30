@extends('dashboard.layouts.main')

@section('body')
  <div class="card shadow mb-4">

    {{-- title --}}
    <div class="card-header text-center">
      <h3 class="">Data Perusahaan</h3>
    </div>

    {{-- body --}}
    <div class="card-body">

      {{-- search --}}
      <form action="" method="post">
        <div class="row mx-5 mb-4">
          <div class="col">
            <input class="form-control" name="keyword" type="search" placeholder="Keyword" aria-label="Search" value="">
          </div>
          <div>
            <button name="cari" class="btn btn-primary" type="submit">Search</button>
          </div>
        </div>
      </form>

      {{-- companies data table --}}
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nama Perusahaan</th>
              <th>E-mail</th>
              <th>No Telp</th>
              <th>Kota</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($companies as $company)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $company['name'] }}</td>
                <td>{{ $company['email'] }}</td>
                <td>{{ $company['phone'] }}</td>
                <td>{{ $company['city'] }}</td>
                <td>
                  <a href="perusahaan.php?id=" class="btn btn-outline-primary btn-block">Detail</a>
                  <a href="hapus-perusahaan.php?id=" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Perusahaan ?')" class="btn btn-outline-danger btn-block">Delete</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection