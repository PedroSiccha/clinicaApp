@extends('layouts.base')
@section('title')
 Generar Citas   
@endsection
@section('contenido')
@if(session()->has('msj'))  
<div class="alert alert-success" role="alert">{{ session('msj') }}</div>
@else
<!-- <div class="alert alert-danger" role="alert">Error al Guardar los Datos</div> -->
@endif

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

<div class="page-title">
        <div class="title_left">
          <h3>Generar Cita</h3>
        </div>    
</div> 
<form class="form-horizontal form-label-left" id="feedback_form" method="POST" action="/paciente/store">
  {!! csrf_field() !!} 
<div class="x_panel">
        <div class="x_title">
          <h2>Paciente <small></small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Settings 1</a>
                </li>
                <li><a href="#">Settings 2</a>
                </li>
              </ul>
            </li>
            <li><a class="close-link "><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix "></div>
        </div>
        <div class="x_content">
          <br />
          
            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
            <input type='text' class='form-control has-feedback-left' id="nombres" name="nombres" placeholder='Nombres' autofocus <?php if ($aux == "letra") { $nombre = $dato; }else { $nombre = " ";}?> value="{{ $nombre }}" onkeypress="return soloLetras(event)" required>
              <span class="fa fa-user form-control-feedback left"  aria-hidden="true"></span>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type='text' class='form-control has-feedback-left' name='apellidos' placeholder='Apellidos' onkeypress="return soloLetras(event)" required <?php if ($aux == "letra") { $apellido = $apellido2." ".$apellido1; }else { $apellido = " ";}?> value="{{ $apellido }}">
              <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type='date' class='form-control has-feedback-left' name='fecnac'  placeholder='Fecha de Nacimiento' required>
                <span class="fa fa-birthday-cake form-control-feedback left" aria-hidden="true"></span>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type='text' class='form-control has-feedback-left' name='doc' placeholder='Documento de Identidad' <?php if ($aux == "letra") { $dni = 'Sin DNI'; }else { $dni = $dato;}?> value='{{ $dni }}' onkeyup="verificarDNI()" id = 'dni'>
                <span class="fa fa-credit-card form-control-feedback right" aria-hidden="true"></span>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type='text' class='form-control has-feedback-left' name='direccion' placeholder='Direccion' >
              <span class="fa fa-map-marker form-control-feedback left" aria-hidden="true"></span>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type='text' class='form-control has-feedback-left' name='telefono' placeholder='Telefono' onkeypress="return numeros(event);">
              <span class="fa fa-mobile-phone form-control-feedback right" aria-hidden="true"></span>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <input type='text' class='form-control has-feedback-left' name='lugarnac' placeholder='Lugar de Nacimiento' >
                  <span class="fa fa-hospital-o form-control-feedback left" aria-hidden="true"></span>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <input type='text' class='form-control has-feedback-left' name='lugarproc' placeholder='Lugar de Procedencia'>
                  <span class="fa fa-fighter-jet form-control-feedback right" aria-hidden="true"></span>
                </div>
            <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                    <input type='text' class='form-control has-feedback-left' name='email' placeholder='Correo Electrónico'>
                  <span class="fa fa-envelope-o form-control-feedback left" aria-hidden="true"></span>
            </div>
            <div class="col-md-5 col-sm-5 col-xs-12 form-group has-feedback" id="divUbicacion">
                <select class='form-control center' id='ocu' name='ocupacions_id' required>
                    <option value="">Seleccione Ocupación..</option>
                    @foreach ($ocupacion as $ocu)
                    <option value="{{ $ocu->id }}">{{ $ocu->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-12 form-group has-feedback">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-ocupacion-modal-lg"><i class="fa fa-plus"></i></button>
            </div>
            <div class="col-md-5 col-sm-5 col-xs-12 form-group has-feedback" id="divInstruccion">
                <select class='form-control center' id='inst' name='instruccions_id' required>
                    <option value="">Seleccione Grado de Instrucción..</option>
                    @foreach ($instruccion as $ins)
                    <option value="{{ $ins->id }}">{{ $ins->nombre }}</option>
                    @endforeach
                </select>    
            </div>
            <div class="col-md-1 col-sm-1 col-xs-12 form-group has-feedback">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-intruccion-modal-lg"><i class="fa fa-plus"></i></button>
            </div>
            <div class="col-md-5 col-sm-5 col-xs-12 form-group has-feedback" id="divEstadoCivil" required>
                <select class='form-control center' id='eci' name='estadocivils_id'>
                    <option value="">Seleccione Estado Civil..</option>
                    @foreach ($estadocivil as $eci)
                    <option value="{{ $eci->id }}">{{ $eci->nombre }}</option>
                    @endforeach
                </select>    
            </div>
            <div class="col-md-1 col-sm-1 col-xs-12 form-group has-feedback">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-estadocivil-modal-lg"><i class="fa fa-plus"></i></button>
            </div>
            <div class="col-md-5 col-sm-5 col-xs-12 form-group has-feedback">
                    <select class='form-control center' id='gnero' name='generos_id' required>
                        <option value="">Seleccione Género..</option>
                        @foreach ($genero as $gen)
                        <option value="{{ $gen->id }}">{{ $gen->nombre }}</option>
                        @endforeach
                    </select>  
                </div>
            <div class="ln_solid"></div>
        </div>
      </div>
        <div class="form-group">
          <div class="left">
             <button class="btn btn-primary" type="reset">Limpiar</button>
            <button type="submit" class="btn btn-success">Guardar</button>
          </div>
        </div>
</form>
          <!-- end of accordion -->
        </div>
      </div>
    </div>
         <!-- Modal Agregar Genero -->
         <div class="modal fade bs-genero-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
    
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                  </button>
                  <h4 class="modal-title" id="myModalLabel">Agregar Nuevo Género</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal form-label-left" id="feedback_form" method="POST" action="/genero">
                      {!! csrf_field() !!}
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Género </label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" class="form-control" placeholder="Genero Nuevo" name="nombre" id="nomGenero">
                      </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          <button type="button" class="btn btn-success" onclick="guardarGenero()" data-dismiss="modal">Guardar</button>
                        <button type="button" class="btn btn-primary"  data-dismiss="modal">Cancelar</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
    
    
        <!-- Modal Agregar Estado Civil -->
    
        <div class="modal fade bs-estadocivil-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
    
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                  </button>
                  <h4 class="modal-title" id="myModalLabel">Agregar Núevo Estado Civil</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Estado Civil </label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" class="form-control" placeholder="Según el DNI" name="nombre" id="nomEstadoCivil">
                      </div>
                    </div>
      
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                        
                        <button type="button" class="btn btn-success" onclick="guardarEstadoCivil()" data-dismiss="modal">Guardar</button>
                        <button type="button" data-dismiss="modal" class="btn btn-primary">Cancelar</button>
                        
                      </div>
                    </div>
                </div>
                <div class="modal-footer">
                </div>
    
              </div>
            </div>
          </div>
    
        <!-- Modal Agregar Grado de Instruccion -->
    
        <div class="modal fade bs-intruccion-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
    
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                  </button>
                  <h4 class="modal-title" id="myModalLabel">Agregar Nuevo Grado de Instruccion</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Grado de Instruccion </label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" class="form-control" placeholder="Grado de Instruccón" name="nombre" id="nomInstruccion">
                      </div>
                    </div>
      
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                        
                        <button type="button" class="btn btn-success" onclick="guardarGradoInstruccion()" data-dismiss="modal" >Guardar</button>
                        <button type="button" data-dismiss="modal" class="btn btn-primary">Cancelar</button>
                        
                      </div>
                    </div>
                </div>
                <div class="modal-footer">
                </div>
    
              </div>
            </div>
          </div>
    
        <!-- Modal Agregar Ocupacion -->
    
        <div class="modal fade bs-ocupacion-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
    
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                  </button>
                  <h4 class="modal-title" id="myModalLabel">Agregar Nueva Ocupación</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal form-label-left" id="feedback_form" method="POST" action="/ocupacion/store">
                      {!! csrf_field() !!}
      
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Área </label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" class="form-control" placeholder="Nueva Áreaa" name="nombre" id="nomOcupacion">
                      </div>
                    </div>
    
                    <div class="form-group hidden">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de Área </label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" class="form-control" name="descripcion" value="Medicina">
                      </div>
                    </div>
      
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                        
                          <button type="button" class="btn btn-success" onclick="guardarOcupacion()" data-dismiss="modal">Guardar</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                        
                      </div>
                    </div>
      
                  </form>
                </div>
                <div class="modal-footer">
                </div>
    
              </div>
            </div>
          </div>
    
@endsection

@section('script')

<script> 
  function guardarOcupacion(){
    var nombre=$("#nomOcupacion").val();
    //alert(nombre+apellido+dni+telefono+correo+direccion+fechanacimiento+genero);
    $.post( "/ocupacion/store", {nombre:nombre, _token:'{{csrf_token()}}'}).done(function(data) {
    console.log(data.resultado);

    $("#divUbicacion").empty();
    $("#divUbicacion").html(data.view);

    
    });
  }

  function guardarGradoInstruccion(){
    var nombre=$("#nomInstruccion").val();
    //alert(nombre+apellido+dni+telefono+correo+direccion+fechanacimiento+genero);
    $.post( "/instruccion/store", {nombre:nombre, _token:'{{csrf_token()}}'}).done(function(data) {
    console.log(data.resultado);
    $("#divInstruccion").empty();
    $("#divInstruccion").html(data.view);
    });
  }

  function guardarEstadoCivil(){
    var nombre=$("#nomEstadoCivil").val();
    //alert(nombre+apellido+dni+telefono+correo+direccion+fechanacimiento+genero);
    $.post( "/estadocivil/store", {nombre:nombre, _token:'{{csrf_token()}}'}).done(function(data) {
    console.log(data.resultado);
    $("#divEstadoCivil").empty();
    $("#divEstadoCivil").html(data.view);
    });
  }

  function guardarGenero(){
    var nombre=$("#nomGenero").val();
    //alert(nombre+apellido+dni+telefono+correo+direccion+fechanacimiento+genero);
    $.post( "/genero", {nombre:nombre, _token:'{{csrf_token()}}'}).done(function(data) {
    console.log(data.resultado);
    
    });
  }
  
  function verificarDNI(){
    var dni = $("#dni").val();
    
    $.post( "{{ Route('verificarDNI') }}", {dni: dni, _token:'{{csrf_token()}}'}).done(function(data) {
                if(data.resp == 1)
                {
                    alert('El DNI ya existe');
                }
            });
    
  }
</script>
@endsection

   