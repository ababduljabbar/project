<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

  {{-- All Css File Here --}}
  @include('admin.components.style')
 
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
    @include('admin.components.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('admin.components.mainslidebar')

  <!-- Content Wrapper. Contains page content -->
   @yield('content')
  <!-- /.content-wrapper -->

  {{-- footer  --}}

  @include('admin.components.footer')

 
  <!-- /.control-sidebar -->

</div>
<!-- ./wrapper -->

{{-- All Javadcript Here --}}
@include('admin.components.scripts')

</body>
</html>
