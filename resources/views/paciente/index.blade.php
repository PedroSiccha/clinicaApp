@extends('layouts.base')
@section('title')
 Lista de Pacientes Registrados   
@endsection
@section('contenido')
<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Pacientes <small><button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target=".bs-paciente-modal-lg"><i class="fa fa-plus"></i></button></small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content" id="divPaciente">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Código</th>
                  <th>Nombres</th>
                  <th>DNI</th>
                  <th>Telefono</th>
                  <th>Dirección</th>
                  <th class="hidden">Lugar de Nacimiento</th>
                  <th class="hidden">Lugar de Procedencia</th>
                  <th>Correo</th>
                  <th class="hidden">Fecha de Nacimiento</th>
                  <th>Edad</th>
                  <th>Ocupación</th>
                  <th>Grado de Instrucción</th>
                  <th>Estado Civil</th>
                  <th class="hidden">Genero</th>
                  <th>Administrador</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($paciente as $pac)
                  <tr>
                        <th>{{ $pac->id }}</th>
                        <td>{{ $pac->nombre }}</td>
                        <td>{{ $pac->dni }}</td>
                        <td>{{ $pac->telefono }}</td>
                        <td>{{ $pac->direccion }}</td>
                        <td class="hidden">{{ $pac->lugarnac }}</td>
                        <td class="hidden">{{ $pac->lugarproc }}</td>
                        <td>{{ $pac->correo }}</td>
                        <td class="hidden">{{ $pac->fecnac }}</td>
                        <td>{{ $pac->edad }}</td>
                        <td>{{ $pac->ocupacion }}</td>
                        <td>{{ $pac->instruccion }}</td>
                        <td>{{ $pac->estadocivil }}</td>
                        <td class="hidden">{{ $pac->genero }}</td>
                        <td>
                                <div class="btn-group">
                                        <button class="btn btn-primary btn-xs" onclick="CargarPaciente('{{ $pac->nom }}', '{{ $pac->ape }}', '{{ $pac->fecnac }}', '{{ $pac->dni }}', '{{ $pac->direccion }}', '{{ $pac->telefono }}', '{{ $pac->lugarnac }}', '{{ $pac->lugarproc }}', '{{ $pac->correo }}', '{{ $pac->ocupacion }}', '{{ $pac->instruccion }}', '{{ $pac->estadocivil }}', '{{ $pac->genero }}', '{{ $pac->id }}')" data-placement="top" data-toggle="tooltip" data-original-title="Editar Paciente"><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-danger btn-xs" onclick="EliminarPaciente('{{ $pac->id }}')" data-placement="top" data-toggle="tooltip" data-original-title="Eliminar"><i class="fa fa-eraser"></i></button>
                                        <a class="btn btn-dark btn-xs" href="{{ route('perfilUsuario',[$pac->id]) }}" data-placement="top" data-toggle="tooltip" data-original-title="Perfil de Usuario"><i class="fa fa-user"></i></a>
                                        <a class="btn btn-default btn-xs" href="{{ route('historiaClinica',[$pac->id]) }}" target="_blank" data-placement="top" data-toggle="tooltip" data-original-title="Historia Clinica"><i class="glyphicon glyphicon-folder-open"></i></a>         
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

       <!-- MODAL CREAR GENERO -->
  <div class="modal fade bs-paciente-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="editPaciente">
      <form class="form-horizontal form-label-left" id="feedback_form" method="POST" action="/paciente/store">
          {!! csrf_field() !!}
          <input type='text' class='form-control has-feedback-left hidden' id="idPaciente" name="nombres" placeholder='Nombres'  >
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Paciente</h4>
          </div>
          <div class="modal-body">
              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  <input type='text' class='form-control has-feedback-left' id="nombre" name="nombres" placeholder='Nombres'  >
                <span class="fa fa-user form-control-feedback left"  aria-hidden="true"></span>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  <input type='text' class='form-control has-feedback-left' name='apellidos' placeholder='Apellidos' id="apellido">
                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  <input type='date' class='form-control has-feedback-left' name='fecnac'  placeholder='Fecha de Nacimiento' id="fecnac">
                  <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  <input type='text' class='form-control has-feedback-left' name='doc' placeholder='Documento de Identidad' id="dni">
                  <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  <input type='text' class='form-control has-feedback-left' name='direccion' placeholder='Direccion' id="direccion">
                <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  <input type='text' class='form-control has-feedback-left' name='telefono' placeholder='Telefono' id="telefono">
                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <input type='text' class='form-control has-feedback-left' name='lugarnac' placeholder='Lugar de Nacimiento' id="lugarnac">
                    <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <input type='text' class='form-control has-feedback-left' name='lugarproc' placeholder='Lugar de Procedencia' id="lugarproc">
                    <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                  </div>
              <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                      <input type='text' class='form-control has-feedback-left' name='email' placeholder='Correo Electrónico' id="correo">
                    <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
              </div>
              <div class="col-md-5 col-sm-5 col-xs-12 form-group has-feedback">
                  <select class='form-control center' id='ocu' name='ocupacions_id'>
                      @foreach ($ocupacion as $ocu)
                      <option value="{{ $ocu->id }}">{{ $ocu->nombre }}</option>
                      @endforeach
                  </select>
              </div>
              <div class="col-md-1 col-sm-1 col-xs-12 form-group has-feedback">
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-ocupacion-modal-lg"><i class="fa fa-plus"></i></button>
              </div>
              <div class="col-md-5 col-sm-5 col-xs-12 form-group has-feedback">
                  <select class='form-control center' id='inst' name='instruccions_id'>
                      @foreach ($instruccion as $ins)
                      <option value="{{ $ins->id }}">{{ $ins->nombre }}</option>
                      @endforeach
                  </select>    
              </div>
              <div class="col-md-1 col-sm-1 col-xs-12 form-group has-feedback">
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-intruccion-modal-lg"><i class="fa fa-plus"></i></button>
              </div>
              <div class="col-md-5 col-sm-5 col-xs-12 form-group has-feedback">
                  <select class='form-control center' id='eci' name='estadocivils_id'>
                      @foreach ($estadocivil as $eci)
                      <option value="{{ $eci->id }}">{{ $eci->nombre }}</option>
                      @endforeach
                  </select>    
              </div>
              <div class="col-md-1 col-sm-1 col-xs-12 form-group has-feedback">
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-estadocivil-modal-lg"><i class="fa fa-plus"></i></button>
              </div>
              <div class="col-md-5 col-sm-5 col-xs-12 form-group has-feedback">
                      <select class='form-control center' id='gnero' name='generos_id'>
                          @foreach ($genero as $gen)
                          <option value="{{ $gen->id }}">{{ $gen->nombre }}</option>
                          @endforeach
                      </select>  
                  </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="EditarPaciente()">Guardar</button>
          </div>
        </div>
      </div>
  </form>
</div>

@endsection
@section('script')
<script>
function CargarPaciente(nom,ape,fecnac,dni,direccion,telefono,lugarnac,lugarproc,correo,ocupacion,instruccion,estadocivil,genero, idPaciente){ 
  $('#editPaciente').modal('show');
  
  $("#nombre").val(nom);
  $("#apellido").val(ape);
  $("#fecnac").val(fecnac);
  $("#dni").val(dni);
  $("#direccion").val(direccion);
  $("#telefono").val(telefono);
  $("#lugarnac").val(lugarnac);
  $("#lugarproc").val(lugarproc);
  $("#correo").val(correo);
  $("#ocu").val(ocupacion);
  $("#inst").val(instruccion);
  $("#eci").val(estadocivil);
  $("#gnero").val(genero);
  $("#idPaciente").val(idPaciente);
}

function EditarPaciente(){ 

  var nombre = $('#nombre').val();
  var apellido = $('#apellido').val();
  var fecnac = $('#fecnac').val();
  var dni = $('#dni').val();
  var direccion = $('#direccion').val();
  var telefono = $('#telefono').val();
  var lugarnac = $('#lugarnac').val();
  var lugarproc = $('#lugarproc').val();
  var correo = $('#correo').val();
  var ocu = $('#ocu').val();
  var inst = $('#inst').val();
  var eci = $('#eci').val();
  var gnero = $('#gnero').val();
  var idPaciente = $('#idPaciente').val();

  $.post('{{ route("paciente.edit") }}', {nombre: nombre, apellido: apellido, fecnac: fecnac, dni: dni, direccion: direccion, telefono: telefono, lugarnac: lugarnac, lugarproc: lugarproc, correo: correo, ocu: ocu, inst: inst, eci: eci, gnero: gnero, idPaciente: idPaciente, _token: '{{ csrf_token() }}'}).done(function(data){
  // alert(data.resultado);
   
   $("#divPaciente").empty();
   $("#divPaciente").html(data.view);

  });
}

function EliminarPaciente(idPac){ 

  $.post('{{ route("paciente.delete") }}', {idPac: idPac, _token: '{{ csrf_token() }}'}).done(function(data){
    $("#divPaciente").empty();
    $("#divPaciente").html(data.view);

  });
}


</script>
@endsection