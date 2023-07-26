@extends('layouts.base')
@section('contenido')
@section('title')
 Inicio   
@endsection
<script>
  function numeros(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " 0123456789";
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


</script>

<div class="row top_tiles">
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12" >
        <a data-toggle="modal" data-target=".bs-example-modal-lg">
      <div class="tile-stats">
        <div class="icon"><i class="fa fa-pencil-square-o"></i></div>
        <div class="count">{{ $cantCitas[0]->cantidad }}</div>
        <h3>Nueva Cita</h3>
        <p>Generar Citas Para Consulta.</p>
      </div>
        </a>
    </div>
    
    
    
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a data-toggle="modal" data-target=".bs-triaje-modal-lg">
      <div class="tile-stats">
        <div class="icon"><i class="fa fa-male"></i></div>
        <div class="count">{{ $cantTriaje[0]->cantidad }}</div>
        <h3>Registro de Triaje</h3>
        <p> Ingrese las pruebas del triaje.</p>
      </div>
    </a>
    </div>
    
    
   <a href="\consulta"><div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a data-toggle="modal" data-target=".bs-consulta-modal-lg">
      <div class="tile-stats">
        <div class="icon"><i class="fa fa-file-pdf-o"></i></div>
        <div class="count">{{ $cantConsulta[0]->cantidad }}</div>
        <h3>Pacientes Para Consulta</h3>
        <p> Lista de los pacientes para el médico...</p>
      </div>
    </a>
    </div></a>  
  </div> 

  <!-- Modal Generador de CIta Exámen --> 
  
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
  
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Inserte DNI del Paciente</h4>
            </div>
            <div class="modal-body">
              <h4>DNI:</h4>
              <input autofocus autocomplete="off" type="text" id="doc" name="doc" required="required" class="form-control">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary" id="btnAceptar" onclick="compararDNI()">Aceptar</button>
            </div>
  
          </div>
        </div>
      </div>
    

  <!-- Modal Visualizar Triaje -->
  <form class="form-horizontal form-label-left" id="feedback_form" method="GET" action="/triaje">
    <div class="modal fade bs-triaje-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
  
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Lista de Espera Triaje</h4>
            </div>
          
                <div class="x_content">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Paciente</th>
                        <th>Motivo</th>
                        <th class="hidden">Fecha de Atención</th>
                        <th>Hora de Atención</th>
                        <th class="hidden">Diferencia de Hora</th>
                        <th class="hidden">Diferencia de Minuto</th>
                        <th>Generar</th>
                      </tr>
                    </thead>
                    <tbody>  
                      @foreach ($cita as $ci)
                      <input type="text" value="{{ $ci->idCita }}" class="hidden" name="idcita">
                        <tr>
                          <th scope="row">{{ $ci->Numeracion }}</th>
                          <td>{{ $ci->nombrePac }}</td>
                          <td>{{ $ci->motivo }}</td>
                          <td class="hidden">{{ $ci->fecaten }}</td>
                          <td>{{ $ci->horaten }}</td>
                          <td class="hidden">{{ $ci->difhora }}</td>
                          <td class="hidden">{{ $ci->difmin }}</td>
                        <td><a href="triaje/inicio/{{$ci->idCita}}" class="btn btn-sm btn-default" type="button" data-placement="top" data-toggle="tooltip" data-original-title="Registrar Triaje"><i class="fa fa-send"></i></a></td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>

                </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Aceptar</button>
            </div>
  
          </div>
        </div>
      </div>
    </form>
    <!-- Modal Visualizar Pendientes de Consulta -->
    <form class="form-horizontal form-label-left" id="feedback_form" method="GET" action="/consulta">
      
    <div class="modal fade bs-consulta-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
  
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Lista de Pacientes</h4>
            </div>
            <div class="modal-body">
               
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Médico: <small>{{ Auth::user()->name }}</small></h2>
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
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Paciente</th>
                                <th>Motivo</th>
                                <th>Generar</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($consulta as $co)
                              <input type="text" value="{{ $co->idCita }}" class="hidden" name="idcita">
                                <tr>
                                  <th scope="row">{{ $co->Numeracion }}</th>
                                  <td>{{ $co->nombrePac }}</td>
                                  <td>{{ $co->motivo }}</td>
                                <td><a <?php $prueba = $co->motivo; if($prueba == "Consulta"){ $direccion = "consulta/inicio/$co->idCita"; }else{ $direccion = "examenginecologico/$co->idCita"; } ?> href="{{$direccion}}" class="btn btn-sm btn-default" type="button" data-placement="top" data-toggle="tooltip" data-original-title="Pasar a Consulta"><i class="fa fa-send"></i></a></td>
                                </tr>
                              @endforeach
                            </tbody>
                          </table>
        
                        </div>
                  
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Aceptar</button>
            </div>
  
          </div>
        </div>
      </div>
    </div> 
    </form>
    
@endsection
@section('script')

  <script>
    function pasarEnter(e){
      tecla = (document.all) ? e.keyCode : e.which; //Captura pulsacion tecla enter
      if (tecla==13){
        {document.getElementById('btnAceptar').onclick();}
        //console.log('Has pulsado enter'); //Mensaje por consola
      } 
    }

    function compararDNI(){
      
        var nombre=$("#doc").val();
        
      $.post( "{{ route('comparar.cita')}}", {nombre:nombre, _token:'{{csrf_token()}}'}).done(function(data) {
        var id = data.dni;
        if (data.auxiliar == 1) {
          window.location="/cita/createE/"+id+"";  
        }else{
          window.location="/cita/createN/"+id+"";
        }
        
        
      });
      
    }
  </script>

@endsection

<!-- Codigo PHP -->
