@extends('layouts.base')
@section('title')
 Lista de Consultas   
@endsection
@section('contenido')
<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Consultas </h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>

          <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Buscar por Nombre o DNI" id="buscConsulta" onkeyup="filtrado()">
                <span class="input-group-btn">
                  <button class="btn btn-default" type="button">Buscar!</button>
                </span>
              </div>
            </div>
          </div>
          <div class="title_left">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group top_search">
              <div class="input-group">
                      <div class="col-md-6 xdisplay_inputx form-group has-feedback">
                        <input type="date" class="form-control has-feedback-left" id="fecInicio" placeholder="Fecha de Inicio" data-toggle="tooltip" data-placement="top" title="Fecha Inicio" value="<?php echo date("Y-m-01"); ?>" onchange="filtrado()">
                        <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-6 xdisplay_inputx form-group has-feedback">
                        <input type="date" class="form-control has-feedback-right" id="fecFin" placeholder="Fecha de Fin" data-toggle="tooltip" data-placement="top" title="Fecha Fin" value="<?php echo date("Y-m-30"); ?>" onchange="filtrado()">
                        <span class="fa fa-calendar-o form-control-feedback right" aria-hidden="true"></span>
                      </div>
              </div>
            </div>
          </div>
          <div class="x_content" id="listConsultas">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Fecha de Consulta</th> 
                  <th>Hora de Consulta</th>
                  <th>Paciente</th>
                  <th>Numero de DNI</th>
                  <th>Edad</th>
                  <th>Estado de la Consulta</th>
                  <th>Motivo de la Consulta</th>
                  <th>Administración</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($consultas as $co)
                  <tr>
                        <td>{{ $co->FechaConsulta }}</td>
                        <td>{{ $co->HoraConsulta }}</td>
                        <td>{{ $co->NombrePaciente }}</td>
                        <td>{{ $co->DNI }}</td>
                        <td>{{ $co->Edad }}</td>
                        <td>{{ $co->EstadoCita }}</td>
                        <td>{{ $co->MotivoCita }}</td>
                        <td><a href="{{ Route('consultaDetalle', [$co->citas_id]) }}"><button type="button" class="btn btn-dark"><i class="fa fa-eye"></i></button></a></td>
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

      function filtrado(){
        var fechainicio = $("#fecInicio").val();
        var fechafin = $("#fecFin").val();
        var filtro = $("#buscConsulta").val();
        $.post('{{ route("filtradoConsulta") }}', {fechainicio:fechainicio, fechafin: fechafin, filtro: filtro, _token:'{{ csrf_token()}}'}).done(function(data) {
          $("#listConsultas").empty();
          $("#listConsultas").html(data.view);
        });
      }

    </script>
  @endsection