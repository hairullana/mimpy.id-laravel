@extends('dashboard.layouts.main')

@section('body')
  <div class="row">
    <div class="col-12">
      <div class="card shadow-lg">
        <div class="card-header">
            <h3 class="text-center">{{ $company->name }}</h3>
        </div>
        <div class="card-body ml-4 p-4">
          <div class="row">
            <div class="col-md-4 text-center my-auto">
                <img src="/storage/{{ $company->photo }}" class="img-fluid" style="max-width:80%;height:auto" alt="">
            </div>
            <div class="col-md-8">
              <table cellpadding=10px>
                <tr>
                  <td>ID</td>
                  <td>:</td>
                  <td>{{ $company->id }}</td>
                </tr>
                <tr>
                  <td>Email</td>
                  <td>:</td>
                  <td>{{ $company->email }}</td>
                </tr>
                <tr>
                  <td>Phone Number</td>
                  <td>:</td>
                  <td>{{ $company->phone }}</td>
                </tr>
                <tr>
                  <td>City</td>
                  <td>:</td>
                  <td>{{ $company->city }}</td>
                </tr>
                <tr>
                  <td>Address</td>
                  <td>:</td>
                  <td>{{ $company->address }}</td>
                </tr>
                <tr>
                  <td>Description</td>
                  <td>:</td>
                  <td>{{ $company->description }}</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection