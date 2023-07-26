<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('images/favicon.ico')}}" type="image/ico" />
    <script src="{{asset('js/sweetalert.min.js')}}"></script>
    <link href="{{asset('../vendors/bootstrap/dist/css/sweetalert.css')}}" rel="stylesheet" type="text/css"> 

    <title>ClinicaSystem! | @yield('title') </title> 

    <!-- Bootstrap -->
    <link href="{{asset('../vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('../vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('../vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset('../vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">

    <link href="../vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="{{asset('../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{asset('../vendors/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{asset('../vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('../build/css/custom.min.css')}}" rel="stylesheet">

    <link href="{{asset('../build/css/easy-autocomplete.css')}}" rel="stylesheet">
    <link href="{{asset('../build/css/easy-autocomplete.themes.css')}}" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{asset('/home')}}" class="site_title"><i class="fa fa-heart"></i> <span>ClinicaSystem!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{asset('images/img.jpg')}}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido,</span>
                <h2>{{ Auth::user()->name }}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="\home"><i class="fa fa-home"></i> Inicio <span></span></a>

                  </li>
                  <li><a><i class="fa fa-edit"></i> Amdisión <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a data-toggle="modal" data-target=".bs-cita-modal-lg">Generar Cita</a></li>
                      <li><a href="{{asset('/paciente')}}">Ver Lista de Pacientes</a></li>
                      <li><a href="{{ asset('/cita/show') }}">Ver Citas Pendientes</a></li>
                      <li><a href="{{ asset('/listado_graficas') }}">Reporte Citas</a></li>
                    </ul>
                  </li>
                  
                  <li><a><i class="fa fa-stethoscope"></i> Triaje <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{asset('/triaje/show')}}">Lista de Triaje</a></li>
                      <li><a data-toggle="modal" data-target=".bs-triajes-modal-lg">Triaje por Paciente</a></li>
                      <li><a href="{{ asset('/listado_graficas_triaje') }}">Reporte Triaje</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-user-md"></i> Consulta <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{asset('/consulta/ver')}}">Lista de Consultas</a></li>
                      <li><a href="{{ route('consulta.pdf') }}">Imprimir Lista de Consultas</a></li>
                      <li><a href="{{ asset('/listado_graficas_consultas') }}">Reporte Consultas</a></li>
                    </ul>
                  </li>
             
                  <li><a><i class="fa fa-gears"></i> Configuración <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{asset('/configuracion')}}">Configuraciones Básicas</a></li>
                      <li><a href="{{asset('/configmedico')}}">Configuraciones Médicas</a></li>
                    </ul>
                  </li>
                  
                  <li><a><i class="fa fa-warning"></i> Gestion de Seguridad <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ROUTE('usuario.index')}}">Registrar Personal</a></li>
                      
                    </ul>
                  </li>
                  
                  <li><a><i class="fa fa-line-chart"></i> Estadisticas <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{asset('/cita/show')}}">Lista de Citas</a></li>
                    </ul>
                  </li>
                  
                  
                </ul>
              </div>
              

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Limpiar Base de Datos">
                <span class="glyphicon glyphicon-floppy-remove" aria-hidden="true" onclick="LimpiarBd()"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{asset('login.html')}}">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{asset('images/img.jpg')}}" alt="">{{ Auth::user()->name }}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="{{ route('perfil',[ Auth::user()->id ]) }}"> Perfil</a></li>
                    
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();"><i class="fa fa-sign-out pull-right"></i>
                                            Salir
                    </a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                    </form>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dashboard_graph">

                @yield('contenido')                
                
                <div class="clearfix"></div>
              </div>
            </div>

          </div>
          <br />

          

          
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right ">
            Pedro D. Siccha <a href="{{asset('https://www.facebook.com/pedro.siccha')}}"></a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <script>
      function LimpiarBd(){
          var nombre="1";
          //alert(nombre);
          $.post( "{{ Route('configuracion.destroy') }}", {nombre:nombre, _token:'{{csrf_token()}}'}).done(function(data) {
          console.log(data.codigo);
          alert(data.resultado);  
          });
        }
    </script>
    <!-- jQuery -->
    <script src="{{asset('../vendors/jquery/dist/jquery.min.js')}}"></script>
   {{--  <script src="{{asset('../vendors/jquery/jquery3.js')}}"></script> --}}
    <!-- Bootstrap -->
    <script src="{{asset('../vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('../vendors/fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{asset('../vendors/nprogress/nprogress.js')}}"></script>
    <!-- Chart.js -->
    <script src="{{asset('../vendors/Chart.js/dist/Chart.min.js')}}"></script>
    <!-- gauge.js -->
    <script src="{{asset('../vendors/gauge.js/dist/gauge.min.js')}}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{asset('../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{asset('../vendors/iCheck/icheck.min.js')}}"></script>
    <!-- Skycons -->
    <script src="{{asset('../vendors/skycons/skycons.js')}}"></script>
    <!-- Flot -->
    <script src="{{asset('../vendors/Flot/jquery.flot.js')}}"></script>
    <script src="{{asset('../vendors/Flot/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('../vendors/Flot/jquery.flot.time.js')}}"></script>
    <script src="{{asset('../vendors/Flot/jquery.flot.stack.js')}}"></script>
    <script src="{{asset('../vendors/Flot/jquery.flot.resize.js')}}"></script>
    <!-- Flot plugins -->
    <script src="{{asset('../vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
    <script src="{{asset('../vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
    <script src="{{asset('../vendors/flot.curvedlines/curvedLines.js')}}"></script>
    <!-- DateJS -->
    <script src="{{asset('../vendors/DateJS/build/date.js')}}"></script>
    <!-- JQVMap -->
    <script src="{{asset('../vendors/jqvmap/dist/jquery.vmap.js')}}"></script>
    <script src="{{asset('../vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
    <script src="{{asset('../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{asset('../vendors/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('../vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

 





<!-- FullCalendar -->
      <script src="{{asset('../vendors/moment/min/moment.min.js')}}"></script>
      <script src="{{asset('../vendors/fullcalendar/dist/fullcalendar.min.js')}}"></script>

<!-- Custom Theme Scripts -->
      <script src="{{asset('../build/js/custom.min.js')}}"></script>
      <script src="{{asset('../build/js/jquery.easy-autocomplete.js')}}"></script>

       <!-- Bootstrap -->
    <link href="{{asset('../vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('../vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('../vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- FullCalendar -->
    <link href="{{asset('../vendors/fullcalendar/dist/fullcalendar.min.css')}}" rel="stylesheet">
    <link href="{{asset('../vendors/fullcalendar/dist/fullcalendar.print.css')}}" rel="stylesheet" media="print">

    <!-- Custom styling plus plugins -->
    <link href="{{asset('../build/css/custom.min.css')}}" rel="stylesheet"> 
    <script src="{{asset('../js/highcharts.js')}}"></script>
    

    

    <script src="{{asset('../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>
    <script>
      function baseUrl(url){
        return '{{url('')}}/' + url;
      }
    </script>
    
  @yield('script')
  
  </body>

</html>

<!-- Modal Generador de CIta Médica --> 
<form class="form-horizontal form-label-left" id="feedback_form" method="GET" action="/cita">
  <div class="modal fade bs-cita-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Inserte DNI o Nombres Completos del Paciente</h4>
          </div>
          <div class="modal-body">
            <h4>DNI:</h4>
            <input autocomplete="off" type="text" id="doc" name="doc" required="required" class="form-control" >
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" onclick="compararDNI()">Aceptar</button>
          </div>

        </div>
      </div>
    </div>
  </form>

  <!-- Modal Ver Triaje Por Persona --> 
<form class="form-horizontal form-label-left" id="feedback_form" method="GET" action="/triaje/ver">
  <div class="modal fade bs-triajes-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Inserte DNI del Paciente</h4>
          </div>
          <div class="modal-body">
            <h4>DNI:</h4>
            <input autocomplete="off" type="text" id="doc" name="doc" required="required" class="form-control" onkeypress="return numeros(event);" maxlength="8" minlength="8">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Aceptar</button>
          </div>

        </div>
      </div>
    </div>
  </form>

