@include('dashboard.templates.header')
@include('templates.navbar')

<div class="row no-gutters">
  
  @include('dashboard.templates.sidebar')

  <div class="col-md-10 p-5">

    @yield('body')

  </div>
</div>

@include('dashboard.templates.footer')