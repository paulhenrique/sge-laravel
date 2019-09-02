@extends('template.main')

@section('navbar')
@include('components.navbar')
@endsection

@section('content')
<div class="row container-fluid">
@include('components.sidebar')
  <div class="col-xs-12 col-md-10 mt-2">
  <!-- Page Content -->
    <div class="container-fluid">
          @yield('container-dashboard')

    </div>
  </div>
</div>
@endsection

@section('footer')
@endsection





  