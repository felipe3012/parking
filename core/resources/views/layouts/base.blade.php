<!DOCTYPE html> 
<html lang="en">
<head>
    <title>@yield('title') | {{env('APP_NAME')}}</title>
    @include('layouts.css')
</head>
<body class="fix-sidebar">
<!-- Preloader -->
<div class="preloader">
  <div class="cssload-speeding-wheel"></div>
</div>
<div id="wrapper">
   @include('layouts.header')
   @include('layouts.menu')
  <!-- Page Content -->
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h4 class="page-title">@yield('name')</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
          <ol class="breadcrumb">
            <li><a href="#">Inicio</a></li>
            @yield('breadcrumb')
          </ol>
        </div>
        <!-- /.col-lg-12 -->
      </div>
      @yield('content')
      <!-- .right-sidebar -->
      <div class="right-sidebar">
        <div class="slimscrollright">
          <div class="rpanel-title"> Cambiar Contraseña <span><i class="ti-close right-side-toggle"></i></span> </div>
          <div class="r-panel-body">
              {!!Form::open(['route'=>'cambiar','method'=>'post','name'=>'frm','id'=>'frm','role'=>'form','data-toggle'=>'validator','class'=>'form-horizontal form-label-left'])!!}
@include('forms.form_password')
            <div align="center" class="form-group">
                {!!Form::submit('Cambiar',['class'=>'btn btn-sm btn-primary btn-block','id'=>'send'])!!}
            </div>
            {!!Form::close()!!}
          </div>
        </div>
      </div>
      <!-- /.right-sidebar -->
    </div>
    <!-- /.container-fluid -->
    <footer class="footer text-center"> 2017 &copy; Red Dan Technology </footer>
  </div>
  <!-- /#page-wrapper -->
</div>
 <div class="iziModal" id="modal-iframe">
        </div>
@include('layouts.js')
@include('alerts.notifications')
@yield('script')
</body>
</html>