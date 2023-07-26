@extends('layouts.base')
@section('title')
 Configuraciones   
@endsection
@section('contenido')
<div class="col-md-12 col-sm-12 col-xs-12" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Tablas de Configuración </h3>
        </div>

        <div class="title_right">
          <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div>
      </div>

      <div class="clearfix"></div>

      <div class="row">

          <!-- Tabla para la configuracion de los GENEROS -->
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Género <small><button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target=".bs-genero-modal-lg"><i class="fa fa-plus"></i></button></small></h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content" id="divGeneroTab">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Código</th>
                      <th>Género</th>
                      <th>Administrar</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($genero as $gen)
                      <tr>
                            <th>{{ $gen->id }}</th>
                            <td>{{ $gen->nombre }}</td>
                            <td> 
                              <div class="btn-group">
                                <button class="btn btn-primary btn-xs" onclick="agregarGenero('{{$gen->id}}','{{$gen->nombre}}')"><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-danger btn-xs" onclick="eliminarGenero('{{$gen->id}}')"><i class="fa fa-eraser"></i></button>         
                              </div>
                            </td>
                          </tr>
                          
                          
                          
                      @endforeach
                  </tbody>
                </table>
  
              </div>
            </div>
          </div>
          <!-- Fin Tabla para la configuracion de los GENEROS -->

          <!-- Tabla para la configuracion de los ESTADOS CIVILES-->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Estado Civil <small><button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target=".bs-estadocivil-modal-lg" ><i class="fa fa-plus"></i></button></small></h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content" id="divEstadoCivilTab">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Código</th>
                      <th>Estado Civil</th>
                      <th>Administrar</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($estadocivil as $ec)
                      <tr>
                            <th>{{ $ec->id }}</th>
                            <td>{{ $ec->nombre }}</td>
                            <td>
                                    <div class="btn-group">
                                            <button class="btn btn-primary btn-xs" onclick="agregarEstadoCivil('{{$ec->id}}','{{$ec->nombre}}')"><i class="fa fa-pencil"></i></button>
                                            <button class="btn btn-danger btn-xs" onclick="eliminarEstadoCivil('{{$ec->id}}')"><i class="fa fa-eraser"></i></button>         
                                    </div>
                            </td>
                       </tr>      
                      @endforeach
                  </tbody>
                </table>
  
              </div>
            </div>
          </div>
          <!-- FIN de Tabla -->

        <div class="clearfix"></div>

        <!-- Tabla para la configuracion de los GRADO DE INSTRUCCION -->
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Grado de Instrucción <small><button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target=".bs-instruccion-modal-lg"><i class="fa fa-plus"></i></button></small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content" id="divInstruccionTab">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Código</th>
                    <th>Grado de Instrucción</th>
                    <th>Administrar</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($instruccion as $ins)
                    <tr>
                            <th scope="row">{{ $ins->id }}</th>
                            <td>{{ $ins->nombre }}</td>
                            <td>
                                    <div class="btn-group">
                                            <button class="btn btn-primary btn-xs" onclick="agregarInstruccion('{{$ins->id}}','{{$ins->nombre}}')"><i class="fa fa-pencil"></i></button>
                                            <button class="btn btn-danger btn-xs" onclick="eliminarInstruccion('{{$ins->id}}')"><i class="fa fa-eraser"></i></button>         
                                    </div>
                            </td>
                    </tr>      
                    @endforeach
                </tbody>
              </table>

            </div>
          </div>
        </div>
        <!-- FIn Tabla -->


        <!-- Tabla para la configuracion de los OCUPACION -->
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Ocupación <small><button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target=".bs-ocupacion-modal-lg"><i class="fa fa-plus"></i></button></small></h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content" id="divOcupacionTab">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Código</th>
                      <th>Ocupación</th>
                      <th>Administrar</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($ocupacion as $ocu)
                      <tr>
                            <th scope="row">{{ $ocu->id }}</th>
                            <td>{{ $ocu->nombre }}</td>
                            <td>
                                    <div class="btn-group">
                                            <button class="btn btn-primary btn-xs" onclick="agregarOcupacion('{{$ocu->id}}','{{$ocu->nombre}}')"><i class="fa fa-pencil"></i></button>
                                            <button class="btn btn-danger btn-xs" onclick="eliminarOcupacion('{{$ocu->id}}')"><i class="fa fa-eraser"></i></button>         
                                    </div>
                            </td>
                      </tr>      
                      @endforeach
                  </tbody>
                </table>
  
              </div>
            </div>
          </div>

          <!-- Fin Tabla -->

        <div class="clearfix"></div>
      </div>
    </div>
  </div>

  <!-- MODALES -->
  <!-- MODAL CREAR GENERO -->
  <div class="modal fade bs-genero-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <form class="form-horizontal form-label-left" id="feedback_form" method="POST" action="/genero/guardar">
            {!! csrf_field() !!}
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Nuevo Genero</h4>
            </div>
            <div class="modal-body">
              <h4>Registrar Género:</h4>
              <p>
                  <div class="control-form">
                    <input type="text" class="form-control" placeholder="Ingrese aquí el género nuevo" name='nombre'>
                  </div>
               </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </div>
        </div>
    </form>
  </div>

  <!-- MODAL CREAR ESTADO CIVIL -->
  <div class="modal fade bs-estadocivil-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <form class="form-horizontal form-label-left" id="feedback_form" method="POST" action="/estadocivil/guardar">
            {!! csrf_field() !!}
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Nuevo Estado Civil</h4>
            </div>
            <div class="modal-body">
              <h4>Registrar Estado Civil:</h4>
              <p>
                  <div class="control-form">
                    <input type="text" class="form-control" placeholder="Ingrese aquí el nuevo estado civil" name="nombre">
                  </div>
               </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </div>
        </div>
        </form>
  </div>

  <!-- MODAL CREAR INSTRUCCION -->
  <div class="modal fade bs-instruccion-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <form class="form-horizontal form-label-left" id="feedback_form" method="POST" action="/instruccion/guardar">
            {!! csrf_field() !!}
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Nuevo grado de instrucción</h4>
            </div>
            <div class="modal-body">
              <h4>Registrar Grado de Instrucción:</h4>
              <p>
                  <div class="control-form">
                    <input type="text" class="form-control" placeholder="Ingrese aquí el grado de instrucción" name="nombre">
                  </div>
               </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </div>
        </div>
        </form>
  </div>

  <!-- MODAL CREAR OCUPACION -->
  <div class="modal fade bs-ocupacion-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <form class="form-horizontal form-label-left" id="feedback_form" method="POST" action="/ocupacion/guardar">
            {!! csrf_field() !!}
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Nueva Ocupación</h4>
            </div>
            <div class="modal-body">
              <h4>Registrar Ocupación:</h4>
              <p>
                  <div class="control-form">
                    <input type="text" class="form-control" placeholder="Ingrese aquí la nueva ocupación" name="nombre">
                  </div>
               </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>

          </div>
        </div>
        </form>
  </div>

  <!-- MODAL Editar GENERO -->
  <div class="modal fade bs-editgenero-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="modalEditGenero">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Editar Genero</h4>
            </div>
            <div class="modal-body">
              <h4>Registrar Género:</h4>
              <p>
                  <div class="control-form">
                  <input type="text" class="form-control hidden" name='id' id="idg">  
                  <input type="text" class="form-control" name='nombre' id="nombreg">
                  </div>
               </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="editarGenero()">Guardar</button>
            </div>
          </div>
        </div>
  </div>

  <!-- MODAL Editar Estado Civil -->
  <div class="modal fade bs-editestadocivil-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="modalEditEstadoCivil">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Editar Estado Civil</h4>
          </div>
          <div class="modal-body">
            <h4>Edite el Estado Civil:</h4>
            <p>
                <div class="control-form">
                <input type="text" class="form-control hidden" name='id' id="idec">  
                <input type="text" class="form-control" name='nombre' id="nombrec">
                </div>
             </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary" onclick="editarEstadoCivil()" data-dismiss="modal">Editar</button>
          </div>
        </div>
      </div>
</div>

<!-- MODAL Editar Grado de Instruccion -->
<div class="modal fade bs-editinstruccion-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="modalEditInstruccion">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Editar Genero</h4>
        </div>
        <div class="modal-body">
          <h4>Registrar Género:</h4>
          <p>
              <div class="control-form">
              <input type="text" class="form-control hidden" name='id' id="idi">  
              <input type="text" class="form-control" name='nombre' id="nombrei">
              </div>
           </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary" onclick="editarInstruccion()" data-dismiss="modal">Guardar</button>
        </div>
      </div>
    </div>
</div>

<!-- MODAL Editar Ocupacion -->
<div class="modal fade bs-editocupacion-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="modalEditOcupacion">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Editar Genero</h4>
        </div>
        <div class="modal-body">
          <h4>Registrar Género:</h4>
          <p>
              <div class="control-form">
              <input type="text" class="form-control hidden" name='id' id="ido">  
              <input type="text" class="form-control" name='nombre' id="nombreo">
              </div>
           </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary" onclick="editarOcupacion()" data-dismiss="modal">Guardar</button>
        </div>
      </div>
    </div>
</div>

 
  @endsection
  @section('script')
    <script>
      function agregarGenero(id,nombre){
        $('#modalEditGenero').modal('show');
        $('#idg').val(id);
        $('#nombreg').val(nombre);
      }
      function editarGenero(){
        var id = $('#idg').val();
        var nombre = $('#nombreg').val();
        
        $.post( "{{ route('genero.editar') }}", {id:id, nombre: nombre, _token:'{{csrf_token()}}'}).done(function(data) {
          $("#divGeneroTab").empty();
          $("#divGeneroTab").html(data.view);
        });
        
      }
      function eliminarGenero(id){
        $.post( "{{ route('genero.eliminar') }}", {id:id, _token:'{{csrf_token()}}'}).done(function(data) {
          $("#divGeneroTab").empty();
          $("#divGeneroTab").html(data.view);
        });
      }

      function agregarEstadoCivil(id,nombre){
        $('#modalEditEstadoCivil').modal('show');
        $('#idec').val(id);
        $('#nombrec').val(nombre);
      }
      function editarEstadoCivil(){
        var id = $('#idec').val();
        var nombre = $('#nombrec').val();
        
        $.post( "{{ route('estadocivil.editar') }}", {id:id, nombre: nombre, _token:'{{csrf_token()}}'}).done(function(data) {
          $("#divEstadoCivilTab").empty();
          $("#divEstadoCivilTab").html(data.view);
        });
        
      }
      function eliminarEstadoCivil(id){
        $.post( "{{ route('estadocivil.eliminar') }}", {id:id, _token:'{{csrf_token()}}'}).done(function(data) {
          $("#divEstadoCivilTab").empty();
          $("#divEstadoCivilTab").html(data.view);
        });
      }

      function agregarInstruccion(id,nombre){
        $('#modalEditInstruccion').modal('show');
        $('#idi').val(id);
        $('#nombrei').val(nombre); 
      }
      function editarInstruccion(){
        var id = $('#idi').val();
        var nombre = $('#nombrei').val();
        
        $.post( "{{ route('instruccion.editar') }}", {id:id, nombre: nombre, _token:'{{csrf_token()}}'}).done(function(data) {
          $("#divInstruccionTab").empty();
          $("#divInstruccionTab").html(data.view);
        });
        
      }
      function eliminarInstruccion(id){
        $.post( "{{ route('instruccion.eliminar') }}", {id:id, _token:'{{csrf_token()}}'}).done(function(data) {
          $("#divInstruccionTab").empty();
          $("#divInstruccionTab").html(data.view);
        });
      }

      function agregarOcupacion(id,nombre){
        $('#modalEditOcupacion').modal('show');
        $('#ido').val(id);
        $('#nombreo').val(nombre);
        
      }

      function editarOcupacion(){
        var id = $('#ido').val();
        var nombre = $('#nombreo').val();
        
        $.post( "{{ route('ocupacion.editar') }}", {id:id, nombre: nombre, _token:'{{csrf_token()}}'}).done(function(data) {
          $("#divOcupacionTab").empty();
          $("#divOcupacionTab").html(data.view);
        });
        
      }
      function eliminarOcupacion(id){
        $.post( "{{ route('ocupacion.eliminar') }}", {id:id, _token:'{{csrf_token()}}'}).done(function(data) {
          $("#divOcupacionTab").empty();
          $("#divOcupacionTab").html(data.view);
        });
      }
    </script>
  @endsection