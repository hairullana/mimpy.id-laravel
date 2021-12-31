@extends('dashboard.layouts.main')

@section('body')
  <div class="card shadow-lg">
    {{-- header --}}
    <div class="card-header">
      <h3 class="text-center">{{ $applicant->name }}</h3>
    </div>
    <div class="card-body ml-4 p-4">
      <div class="row">
        <div class="col-md-4 text-center my-auto">
          <img src="/storage/{{ $applicant->photo }}" class="img-fluid" style="max-width:80%;height:auto" alt="">
        </div>
        <div class="col-md-8">
          <table cellpadding=10px>
            <tr>
              <td>ID</td>
              <td>:</td>
              <td>{{ $applicant->id }}</td>
            </tr>
            <tr>
              <td>Email</td>
              <td>:</td>
              <td>{{ $applicant->email }}</td>
            </tr>
            <tr>
              <td>Phone</td>
              <td>:</td>
              <td>{{ $applicant->phone }}</td>
            </tr>
            <tr>
              <td>Gender</td>
              <td>:</td>
              <td>
                @if ($applicant->gender)
                  Male
                @else
                  Female
                @endif
              </td>
            </tr>
            <tr>
              <td>Address</td>
              <td>:</td>
              <td>{{ $applicant->address }}</td>
            </tr>
            <tr>
              <td>CV</td>
              <td>:</td>
              <td><a href="assets/cv/">cv</a></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection