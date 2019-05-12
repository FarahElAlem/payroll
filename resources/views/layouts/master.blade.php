<!DOCTYPE html>
<html>
@include('layouts.partials.head')
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  @include('layouts.partials.header')
  <!-- Left side column. contains the logo and sidebar -->
  @include('layouts.partials.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="container">
      @yield('content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('layouts.partials.footer')
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
@include('layouts.partials.footer-scripts')
</body>
</html>
