@extends('template.main')

@section('navbar')
  @include('components.navbar')
@endsection

@section('content')
<div class="row container-fluid">
@include('components.sidebar')
  <div class="col-md-12 col-lg-12 mt-2">
  <!-- Page Content -->

          @yield('container-dashboard')
          <div class="float"><a onclick="window.history.back()" class="float"><i class="fa fa-plus my-float"></i></a>
          </div>

  </div>
</div>
@endsection
@section('footer')
@endsection





