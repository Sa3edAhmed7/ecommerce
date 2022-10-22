<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $setting->name }}</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('assets')}}/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets')}}/admin/dist/css/adminlte.min.css">


@yield('front-style')

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Main Sidebar Container -->
  @include('front.dashboard.inc.nav')
  @include('front.dashboard.inc.side')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bg-white">
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

        @yield('content')
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-light">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>{{ Auth::user()->name }}</h5>
      <p>{{ Auth::user()->email }}</p>
      <a class="dropdown-item bg-dark" href="{{ route('logout') }}"
      onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
          class="bx bx-log-out"></i>logout</a>
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
  </form>
    </div>
  </aside>
  <!-- /.control-sidebar -->




  <!-- Main Footer -->
  <footer class="main-footer">
      <!-- Default to the left -->
    <strong>Copyright &copy; 2022 <a class="text-danger" href="{{ route('index') }}">Store</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('assets')}}/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets')}}/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets')}}/admin/dist/js/adminlte.min.js"></script>
@yield('front-script')
</body>
</html>
