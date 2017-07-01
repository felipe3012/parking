<!-- Left navbar-header -->
  <div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse slimscrollsidebar">
      <ul class="nav" id="side-menu">
        <li class="sidebar-search hidden-sm hidden-md hidden-lg">
          <!-- input-group -->
          <div class="input-group custom-search-form">
            <input type="text" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
            <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
            </span> </div>
          <!-- /input-group -->
        </li>
        <li class="nav-small-cap m-t-10">--- Menu Principal</li>

         <li> <a href="{!!url('/')!!}" class="waves-effect"><i class="linea-icon linea-basic fa-fw" data-icon="Z"></i> <span class="hide-menu"> Inicio  </span></a></li>

         @if(in_array(1, Auth::user()->permisos()))
        <li> <a href="{!!url('tickets')!!}" class="waves-effect"><i class="icon-tag fa-fw"></i> <span class="hide-menu"> Tickets  </span></a>
        </li>
         @endif

         @if(in_array(9, Auth::user()->permisos()))
        <li> <a href="{!!url('clientes')!!}" class="waves-effect"><i class="fa fa-car fa-fw"></i> <span class="hide-menu"> Clientes  </span></a>
        </li>
         @endif

         @if(in_array(13, Auth::user()->permisos()))
        <li> <a href="{!!url('empresas')!!}" class="waves-effect"><i class="fa fa-building-o fa-fw" data-icon="v"></i> <span class="hide-menu"> Empresas  </span></a>
        </li>
         @endif

         @if(in_array(17, Auth::user()->permisos()))
        <li> <a href="{!!url('convenios')!!}" class="waves-effect"><i class="linea-icon linea-basic fa-fw" data-icon="v"></i> <span class="hide-menu"> Convenios  </span></a>
        </li>
         @endif

         @if(in_array(5, Auth::user()->permisos()))
        <li> <a href="{!!url('cortesias')!!}" class="waves-effect"><i class="icon-badge fa-fw"></i> <span class="hide-menu"> Cortesias  </span></a>
        </li>
         @endif

         @if(in_array(21, Auth::user()->permisos()))
        <li><a href="{!!url('cajas')!!}" class="waves-effect"><i data-icon=")" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Cajas </span></a>
        </li>
         @endif

         @if(in_array(25, Auth::user()->permisos()))
        <li> <a href="{!!url('tarifas')!!}" class="waves-effect"><i data-icon="/" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Tarifas </span></a>
        </li>
         @endif

         @if(in_array(29, Auth::user()->permisos()))
        <li> <a href="{!!url('servicios')!!}" class="waves-effect"><i class="ti-briefcase fa-fw"></i> <span class="hide-menu">Servicios</span></a></li>
         @endif

        @if(in_array(33, Auth::user()->permisos()))
        <li> <a href="{!!url('tipovehiculos')!!}" class="waves-effect"><i class="fa fa-bars fa-fw"></i> <span class="hide-menu">Tipo Vehiculos</span></a></li>
        @endif

       @if(in_array(37, Auth::user()->permisos()))
      <li> <a href="{!!url('reportes')!!}" class="waves-effect"><i class="fa fa-bar-chart fa-fw"></i> <span class="hide-menu">Reportes</span></a>
        </li>
         @endif

@if(in_array(38, Auth::user()->permisos()) || in_array(48, Auth::user()->permisos()) || in_array(42, Auth::user()->permisos()) || in_array(46, Auth::user()->permisos()) || in_array(47, Auth::user()->permisos()))
        <li class="nav-small-cap">--- Menu Administrativo</li>

        @if(in_array(38, Auth::user()->permisos()))        
        <li> <a href="{!!url('perfiles')!!}" class="waves-effect "><i data-icon="&#xe008;" class="icon-people fa-fw"></i> <span class="hide-menu">Perfiles</span></a>
        </li>
         @endif

        @if(in_array(48, Auth::user()->permisos()))
        <li> <a href="{!!url('funcionalidades')!!}" class="waves-effect"><i data-icon="&#xe006;" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Funcionalidades</span></a>
        </li>
         @endif

        @if(in_array(42, Auth::user()->permisos()))
        <li> <a href="{!!url('usuarios')!!}" class="waves-effect"><i data-icon="O" class="icon-user fa-fw"></i> <span class="hide-menu">Usuarios</span></a>
        </li>
         @endif

        @if(in_array(46, Auth::user()->permisos()))
        <li> <a href="{!!url('configuraciones')!!}" class="waves-effect"><i data-icon="P" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Configuración</span></a> </li>
         @endif

       @if(in_array(47, Auth::user()->permisos()))
        <li> <a href="{!!url('backups')!!}" class="waves-effect"><i class="fa fa-database fa-fw"></i> <span class="hide-menu">Backup</span></a> </li>   
        @endif

        @endif
      </ul>
    </div>
  </div>
  <!-- Left navbar-header end -->