 <!-- Top Navigation -->
  <nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
      <div class="top-left-part"><a class="logo" href="#"><b><img src="theme/plugins/images/parkinglotlogo.png" width="50" alt="home" /></b><span class="hidden-xs"><img src="theme/plugins/images/parkinglottext.png" width="140" alt="home" /></span></a></div>
      <ul class="nav navbar-top-links navbar-left hidden-xs">
        <li style="background-color:#E5B20A;"><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
        
      </ul>
      <ul class="nav navbar-top-links navbar-right pull-right">
        <!-- /.dropdown -->
        <li class="dropdown"> <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> 
        <img src="theme/plugins/images/users/varun.png" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">
        @if(Auth::check()){{Auth::user()->name}}@endif</b> </a>
          <ul class="dropdown-menu dropdown-user animated flipInY">
            <li><a href="{!!url('auth/logout')!!}"><i class="fa fa-power-off"></i> Salir</a></li>
          </ul>
          <!-- /.dropdown-user -->
        </li>
        <li style="background-color:#E5B20A;" class="right-side-toggle"> <a class="waves-effect waves-light" href="javascript:void(0)"><i class="ti-settings"></i></a></li>
        <!-- /.dropdown -->
      </ul>
    </div>
    <!-- /.navbar-header -->
    <!-- /.navbar-top-links -->
    <!-- /.navbar-static-side -->
  </nav>
  <!-- End Top Navigation -->