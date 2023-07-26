@extends('layouts.base')
@section('title')
 Lista de Citas Pendientes   
@endsection
@section('contenido')
<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Pacientes</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Código</th> 
                  <th>Nombres</th>
                  <th>DNI</th>
                  <th>Telefono</th>
                  <th>Correo</th>
                  <th>Fecha de Atención</th>
                  <th>Hora de Atención</th>
                  <th class="hidden">Diferencia de Hora</th>
                  <th>Motivo de Consulta</th>
                  <th>Administrador</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($cita as $ci)
                  <tr>
                        <th>#</th>
                        <td>{{ $ci->nombre }}</td>
                        <td>{{ $ci->dni }}</td>
                        <td>{{ $ci->telefono }}</td>
                        <td>{{ $ci->correo }}</td>
                        <td>{{ $ci->fecaten }}</td>
                        <td>{{ $ci->horaten }}</td>
                        <td class="hidden">{{ $ci->difhora }}</td>
                        <?php
                          if ($ci->difhora<2) {
                            $action = "hidden";
                          } else {
                            $action = "";
                          }
                          
                          ?>
                        <td>{{ $ci->motivo }}</td>
                        <td>
                                <div class="btn-group">
                                  <button class="btn btn-primary btn-xs {{ $action }}" data-toggle="modal" data-target=".bs-editcita-modal-lg" onclick="agregarCita('{{$ci->citas_id}}', '{{$ci->pacientes_id}}', '{{$ci->nombre}}', '{{$ci->fecaten}}', '{{$ci->horaten}}', '{{$ci->motivo}}', '{{$ci->tiempo}}')"><i class="fa fa-pencil"></i></button>
                                  <button class="btn btn-danger btn-xs hidden " data-toggle="modal" data-target=".bs-deletegenero-modal-lg"><i class="fa fa-eraser"></i></button>
                                  <button class="btn btn-default btn-xs hidden" data-toggle="modal" data-target=".bs-deletegenero-modal-lg"><i class="fa fa-print"></i></button>         
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

      <!-- MODAL Editar Cita -->
<div class="modal fade bs-editcita-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <form class="form-horizontal form-label-left" id="feedback_form" method="POST" action="/cita/guardar">
        {!! csrf_field() !!}
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Cambiar Cita</h4>
          <input type="txt" class="form-control hidden" id="idCitas" name="idCitas">
        </div>
        
            <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="col-sm-12">
                    <div class="col-xs-12">
                      <h2 id="nom"></h2>
                      <p><strong>Fecha: <input type="text" class="form-control" id="fecha" name="fechaActualizacion"></strong></p>
                      <ul class="list-unstyled">
                        <li><i class="fa fa-building"></i> Hora: <input type="txt" class="form-control" id="horaten" name="horaActualizacion"></li>
                        <li><i class="fa fa-phone"></i> Motivo: <input type="txt" class="form-control" id="motivo" name="motivoActualizacion"></li>
                        <li><i class="fa fa-phone"></i> Tiempo de Enfermedad: <input type="txt" class="form-control" id="tiempo" name="tiempoActualizacion"></li>
                        <input type="txt" class="form-control hidden" id="id" name="idPacientes">
                      </ul>
                    </div>
                  </div>
                  
              </div>
        
        <div class="modal-footer">
            <button type="submit" class="btn btn-success btn-sm"> <i class="fa fa-user">
              </i> Actualizar </button>
            <button type="button" class="btn btn-primary btn-sm">
              <i class="fa fa-user"> </i> Cancelar
            </button>
        </div>
      </div>
    </div>
</form> 
</div>

@endsection

@section('script')
    <script>
      function agregarCita(idCitas, id,nombre,fecaten, horaten, motivo, tiempo){
        $('#id').val(id);
        $('#nombre').val(nombre);
        $('#fecha').val(fecaten);
        $('#horaten').val(horaten);
        $('#motivo').val(motivo);
        $('#tiempo').val(tiempo);
        $('#idCitas').val(idCitas);
        document.getElementById("nom").innerHTML = nombre; 

        var citas_id = idCi;
      }
    </script>
  @endsection