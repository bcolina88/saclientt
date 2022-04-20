<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title', 'Inicio | SACLIENT') </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">

  <link rel="stylesheet" href="{{ asset('dist/css/skins/skin-blue.min.css') }}">

  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css') }}">
   <!-- daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css') }}">
  <!-- bootstrap Datatables -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}">
 <link rel="stylesheet" href="{{ asset('plugins/datetimepicker/bootstrap-datetimepicker.css') }}" />

 <link rel="stylesheet" href="{{ asset('plugins/iCheck/all.css') }}">

 
   <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">

 <!--  <script src="{{ asset('dist/js/select2.js') }}"></script>-->
  <link rel="stylesheet" href="{{ asset('dist/css/select2.css') }}">
{{--   {!!HTML::script('dist/js/select2.js')!!}
  {!!HTML::style('dist/css/select2.css',['rel'=>'stylesheet'])!!} --}}



  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">
           
  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="{{ route('home') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">

      </span>
      <!-- logo for regular state and mobile devices -->
     <span class="logo-lg"><b>SACLIENT</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
 
          </li> 

          <li class="dropdown user user-menu">

            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="{{ asset('dist/img/user2-160x160.png') }}" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">{{ Auth::user()->nombre }} </span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="{{ asset('dist/img/user2-160x160.png') }}" class="img-circle" alt="User Image">

                 <p>
                  {{ Auth::user()->nombre }} 

      
                </p>
             

              </li>
              <!-- Menu Body -->
              <li class="user-body">

                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">

                <div class="pull-right">

                  <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn btn-danger">
                    Salir &nbsp;&nbsp;<i class="fa fa-sign-out"></i>
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->

        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('dist/img/user2-160x160.png') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->nombre }}</p>
          <h6> Sucursal: {{ Session::has('sucursal_nombre') ? Session::get('sucursal_nombre') : '' }}</h6>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>


      <!-- /.search form -->

      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menú de opciones</li>


        <li class="active"><a href="{{ route('home') }}"><i class="fa fa-desktop"></i> <span>Inicio</span></a></li>
 
  
    
        <li class="treeview">
          <a href="#"><i class="fa fa-file-text"></i> <span>Sucursales</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">

             <li><a href="{{ route('sucursales.create') }}">Crear Sucursal</a></li>


      
            <li><a href="{{ route('sucursales.index') }}">Listado de Sucursales</a></li>


          </ul>
        </li>
  


        <li class="treeview">
          <a href="#"><i class="fa fa-users"></i> <span>Clientes</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
           
             <li><a href="{{ route('clientes.create') }}">Crear clientes</a></li>

   
            <li><a href="{{ route('clientes.index') }}">Listado de clientes</a></li>


          </ul>
        </li>
   
     
 
   
        <li class="treeview">
          <a href="#"><i class="fa fa-gears"></i> <span>Configuración</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>

          <ul class="treeview-menu">
            <li class="treeview">
              <a href="#"> Usuarios
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">

                 <li><a href="{{ route('usuarios.create') }}"><i class="fa fa-circle"></i> Crear usuario</a></li>
           

         
                <li><a href="{{ route('usuarios.index') }}"><i class="fa fa-circle"></i> Listado de usuarios</a></li>
         

              </ul>
            </li>

         
            
          
          </ul>
        </li>
  

  
        <li>
          <a href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                    <i class="fa fa-sign-out"></i>
                    <span class="s-text">Salir</span>
                    <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
          </a>
        </li>

      </ul>

    </section>

    <!-- /.sidebar -->
  </aside>


  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

  @yield('content')

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">

    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2022 <a href="#"><b> Brayan Colina</b></a></strong> 
  </footer>
 

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="{{ asset('plugins/moment/moment.js') }}"></script>

<!-- <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>-->
<script src="{{ asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!--<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>-->
<!-- AdminLTE App -->


<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
<!-- Select2 -->
<script src="{{ asset('plugins/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('plugins/select2/i18n/es.js') }}"></script>

<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- bootstrap datepicker -->
<script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('plugins/datepicker/locales/bootstrap-datepicker.es.js') }}"></script>
<!-- bootstrap color picker -->
<!-- DataTable -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<!-- Bootstrap Datetimepicker v4.17.47 -->
<script src="{{ asset('plugins/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>

<!-- SweetAlert -->
<script src="{{ asset('plugins/sweetAlert/sweetalert.js') }}"></script>

<!-- FastClick -->
<script src="{{ asset('bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<!-- FastClick -->
<script src="{{ asset('bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>


<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>


<script src="{{ asset('plugins/input-mask/jquery.inputmask.js') }}"></script>
<script src="{{ asset('plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
<script src="{{ asset('plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>


<script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>


</body>
</html>