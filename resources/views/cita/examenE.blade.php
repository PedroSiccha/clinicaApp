@extends('layouts.base')
@section('title')
 Validar Comprobante    
@endsection
@section('contenido')

<?php

$fechaActual = date("Y-m-d");

 function busca_edad($fecha_nacimiento){
      $dia=date("d");
      $mes=date("m");
      $ano=date("Y");
      $dianaz=date("d",strtotime($fecha_nacimiento));
      $mesnaz=date("m",strtotime($fecha_nacimiento));
      $anonaz=date("Y",strtotime($fecha_nacimiento));
      //si el mes es el mismo pero el día inferior aun no ha cumplido años, le quitaremos un año al actual
      if (($mesnaz == $mes) && ($dianaz > $dia)) {
      $ano=($ano-1); }
      //si el mes es superior al actual tampoco habrá cumplido años, por eso le quitamos un año al actual
      if ($mesnaz > $mes) {
      $ano=($ano-1);}
      //ya no habría mas condiciones, ahora simplemente restamos los años y mostramos el resultado como su edad
      $edad=($ano-$anonaz);
      return $edad;
      
    }
?>

<script>
    function mostrar() {
    var x = $("#nombres").val();
    alert(x);
  }
  
    function numeros(e){
      key = e.keyCode || e.which;
      tecla = String.fromCharCode(key).toLowerCase();
      letras = " 0123456789-";
      especiales = [8,37,39,46];
   
      tecla_especial = false
      for(var i in especiales){
   if(key == especiales[i]){
       tecla_especial = true;
       break;
          } 
      }
   
      if(letras.indexOf(tecla)==-1 && !tecla_especial)
          return false;
  }
  
  function soloLetras(e){
         key = e.keyCode || e.which;
         tecla = String.fromCharCode(key).toLowerCase();
         letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
         especiales = "8-37-39-46";
  
         tecla_especial = false
         for(var i in especiales){
              if(key == especiales[i]){
                  tecla_especial = true;
                  break;
              }
          }
  
          if(letras.indexOf(tecla)==-1 && !tecla_especial){
              return false;
          }
      }
  
  </script>

@foreach($paciente as $pe)
<div class="col-md-12 col-sm-12 col-lg-12" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>{{$pe->apellido}} <small>{{$pe->nombre}}</small></h3>
        </div>

        
      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Paciente <small>N° {{$pe->id}}</small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Settings 1</a>
                    </li>
                    <li><a href="#">Settings 2</a>
                    </li>
                  </ul>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">

              <section class="content invoice">
                <!-- title row -->
                <div class="row">
                  <div class="col-xs-12 invoice-header">
                    <h1>
                      <i class="fa fa-globe"></i> Verifique antes de seguir<small class="pull-right" name="fecha"><?php echo date("d/m/Y"); ?></small>
                    </h1>
                  </div>
                  <!-- /.col -->
                </div> 
                <!-- info row -->
                <div class="row invoice-info">
                  <div class="col-sm-4 invoice-col">
                    Lugar de Procedencia
                    <address>
                                    <strong>{{$pe->lugarproc}}</strong>
                                    <br>{{$pe->direccion}}
                                    <br>Teléfono: {{$pe->telefono}}
                                    <br>Correo: {{$pe->correo}}
                    </address>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 invoice-col">
                    Edad
                    <address>
                                    <strong>{{$pe->edad}}</strong>
                                    <br>Lugar de Nacimiento
                                    <br>{{$pe->lugarnac}}
                                </address>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 invoice-col">
                    
                    <b>DNI:</b> {{$pe->dni}}
                    
                  </div>

                  

                  <!-- /.col -->
                </div>
                <div class="col-sm-3 invoice-col">
                  DNI del Acompañante
                  <address>
                        <strong><input type="text" class="form-control" placeholder="DNI de Acompañante" name="search" minlength="8" maxlength="11" id="acompanante" onkeyup="pasarEnter(event)" /></strong>
                  </address>
                </div>
                <div class="col-sm-4 invoice-col">
                  Nombre
                  <address>
                        <strong><input type="text" class="form-control" id="nombreAcom" placeholder="Nombre" readonly= "true"></strong>
                  </address>
                </div>
                <div class="col-sm-4 invoice-col">
                  Número de Contacto
                  <address>
                        <strong><input type="text" class="form-control" id="telefonoAcom" placeholder="Telefono" readonly= "true"></strong>
                  </address>
                </div>
                <!-- /.row -->

                <!-- Table row -->
                
                  <input type="text" class="form-control has-feedback-left hidden" id="acompañantes_id" placeholder="id" readonly= "true" name="idAcom">
                  <input type="text" class="hidden" name="fecha" id="fecexp" value="<?php echo   date("Y") . "/" . date("m") . "/" .date("d"); ?>">
                  <input type="text" class="hidden" name="pacientes_id" id="pacientes_id" value="{{$pe->id}}">
                <div class="row">
                  <div class="col-xs-12 table">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Cita</th>
                          <th>Fecha de Exámen</th>
                          <th>Hora de Exámen</th>
                          <th>Detalle</th>
                          <th>Tiempo de Enfermedad</th>
                          <th>Estado</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>{{ $idCita[0]->idCita }} <input type="text" class="hidden" name="citas_id" value='' id="citas_id"></td>
                          <td ><input type="date" name="fechaaten" min="<?php echo $fechaActual; ?>" class="form-control has-feedback-left" id="fecaten"></td>
                          <td><div class='input-group date' id='myDatepicker3'>
                              <input type='text' class="form-control" name="horatenc" id="horaten"/>
                              <span class="input-group-addon">
                              </span>
                          </div></td>
                          <td><input type="text" class="form-control" name="Detalle" id="motivo"></td>
                          <td>
                            
                              <select class='form-control center' id='tipoexameninter_id' name='generos_id'>
                                @foreach ($examInterno as $ei)
                                  <option value="{{ $ei->id }}">{{ $ei->nombre }}</option>
                                @endforeach
                              </select>  
                            
                          </td>
                          <td> <button class="btn btn-default"  type="button" onclick="CrearCitaExamen()" ><i class="fa fa-check-square-o"></i> Aceptar</button>
                            <a href="cita-ticket-pdf/{{$paciente[0]->id}}" class="btn btn-sm btn-default" type="button" data-placement="top" data-toggle="tooltip" data-original-title="Imprimir Ticket de Cita"><i class="fa fa-print"></i></a>
                          </td>
                        </tr>
                        
                      </tbody>
                    </table>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->

                
                <!-- /.row -->

                <!-- this row will not appear when printing -->
                <div class="row no-print">
                  <div class="col-xs-12">
                   
                    
                  </div>
                </div>
              </section>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach()

  <div class="modal fade bs-aco-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="idAcom">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Registrar Acompañante</h4>
          </div>
          <div class="modal-body">
              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  <input type="text" class="form-control has-feedback-left" id="nombre" name="nombre" placeholder="Nombres" autofocus onkeypress="return soloLetras(event)">
                  <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellidos" onkeypress="return soloLetras(event)">
                  <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  <input type="text" class="form-control has-feedback-left" id="dni" name="dni" placeholder="DNI" readonly="true">
                  <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono" onkeypress="return numeros(event)">
                  <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  <input type="text" class="form-control has-feedback-left" id="correo" name="correo" placeholder="Correo">
                  <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección">
                  <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  <input type="date" class="form-control has-feedback-left" id="fechanacimiento" name="fecnac" placeholder="Fecha de Nacimiento">
                  <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  <select class='form-control center' id='genero' name='generos_id'>
                      @foreach ($genero as $gen)
                      <option value="{{ $gen->id }}">{{ $gen->nombre }}</option>
                      @endforeach
                  </select>  
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" onclick="guardarAcompanante()" class="btn btn-primary" data-dismiss="modal">Guardar</button>
          </div>

        </div>
      </div>
    </div>
@endsection

@section('script')
    

<script>
        $('#myDatepicker').datetimepicker();
        
        $('#myDatepicker2').datetimepicker({
            format: 'DD.MM.YYYY'
        });
        
        $('#myDatepicker3').datetimepicker({
            format: 'HH:mm'
        });
        
        $('#myDatepicker4').datetimepicker({
            ignoreReadonly: true,
            allowInputToggle: true
        });
    
        $('#datetimepicker6').datetimepicker();
        
        $('#datetimepicker7').datetimepicker({
            useCurrent: false
        });
        
        $("#datetimepicker6").on("dp.change", function(e) {
            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
        });
        
        $("#datetimepicker7").on("dp.change", function(e) {
            $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
        });


        function pasarEnter(e){
              tecla = (document.all) ? e.keyCode : e.which;
              if (tecla==13)
                {
                  
                  var codigo=$("#acompanante").val();
                  //alert(codigo)
                  $.post( "citaa/existeAcom", {codigo:codigo, _token:'{{csrf_token()}}'}).done(function(data) {
                  //alert(data.codigo);
                  $("#nombreAcom").val(data.acompanante);
                  $("#telefonoAcom").val(data.telefonos);
                  $("#acompañantes_id").val(data.id);
                  if(data.resultado=='0')
                    {
                      $('#idAcom').modal('show'); //llamar a modal si no existe registro
                      $("#dni").val(data.codigo);
                    }
                  });
                } 
        }

        function guardarAcompanante(){
          var nombre=$("#nombre").val();
          var apellido=$("#apellido").val();
          var dni=$("#dni").val();
          var telefono=$("#telefono").val();
          var correo=$("#correo").val();
          var direccion=$("#direccion").val();
          var fechanacimiento=$("#fechanacimiento").val();
          var genero=$("#genero").val();
          //alert(nombre+apellido+dni+telefono+correo+direccion+fechanacimiento+genero);
          $.post( "/acompanante/guardar", {nombre:nombre, apellido: apellido, dni: dni, telefono: telefono, correo: correo, direccion: direccion, fechanacimiento: fechanacimiento, genero: genero, _token:'{{csrf_token()}}'}).done(function(data) {
          console.log(data.codigo);
          $("#nombreAcom").val(data.nom);
          $("#telefonoAcom").val(data.tel);  
          });
        }

        function CrearCitaExamen(){
          var fecexp=$("#fecexp").val();
          var fecaten=$("#fecaten").val();
          var motivo=$("#motivo").val();
          //var tiempo=$("#tiempo").val();
          var horaten=$("#horaten").val();
          var pacientes_id=$("#pacientes_id").val();
          var acompañantes_id=$("#acompañantes_id").val();
          var tipoexamen=$("#tipoexameninter_id").val();
          //alert(tipoexamen);
          //var user_id=$("#genero").val();
          //alert(fecexp);
          $.post( "/cita/storeExamen", {fecexp:fecexp, fecaten: fecaten, motivo: motivo, tipoexamen: tipoexamen, horaten: horaten, pacientes_id: pacientes_id, acompañantes_id: acompañantes_id, _token:'{{csrf_token()}}'}).done(function(data) {
          console.log(data.codigo);
          //alert(data.resultado);
          swal({
                title: "Cita",
                text: "Usted Registro la Cita Correctamento, ¿Desea Imprimir?",
                type: "success",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Imprimir",
                cancelButtonText: "Pasar a Triaje",
                closeOnConfirm: false,
                closeOnCancel: false
              },
              function(isConfirm){
                if (isConfirm) {
                    
                    window.location="{{ Route('cita.ticket', [$paciente[0]->id]) }}";
                    {closeOnConfirm: true}
                    
                  } else {
                    window.location="{{ Route('home') }}";
                  }
                                
              });   
          });
        }

    </script>
    @endsection