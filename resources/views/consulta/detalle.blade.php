@extends('layouts.base')
@section('title')
 {{ $triaje[0]->pacNombre }}   |
@endsection
@section('contenido')   

<div class="row">
    <div class="col-md-12"> 
      <div class="x_panel">
        <div class="x_title">
          <h2>{{ $triaje[0]->pacNombre }} <small>{{ $triaje[0]->pacDNI }}</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
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
                                <i class="fa fa-medkit"></i> Datos de Cita.
                                <small class="pull-right">Fecha de La cita: {{ $triaje[0]->citFechaExpedicion }}</small>
                            </h1>
              </div>
              <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
              <div class="col-sm-4 invoice-col">
                Datos Personales
                <address>
                                <strong>{{ $triaje[0]->pacNombre }}</strong>
                                <br>DNI: {{ $triaje[0]->pacDNI }}
                                <br>Telefono: {{ $triaje[0]->pacTelefono }}
                                <br>Direccion: {{ $triaje[0]->pacDireccion }}
                                <br>Lugar de Nacimiento: {{ $triaje[0]->pacLugarNacimiento }}
                                <br>Lugar de Procedencia: {{ $triaje[0]->pacLugarProcedencia }}
                                <br>Correo: {{ $triaje[0]->pacCorreo }}
                                <br>Fecha de Nacimiento: {{ $triaje[0]->pacFechaNacimiento }}
                                <br>Edad: {{ $triaje[0]->pacEdad }}
                                <br>Ocupación: {{ $triaje[0]->ocuNombrepac }}
                                <br>Grado de Instrucción: {{ $triaje[0]->insNombrepac }}
                                <br>Estado Civil: {{ $triaje[0]->escNombrepac }}
                                <br>Genero: {{ $triaje[0]->genNombrepac }}
                            </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                Datos del Acompañante
                <address>
                                <strong>{{ $triaje[0]->acoNombre }}</strong>
                                <br>DNI: {{ $triaje[0]->acoDNI }}
                                <br>Teléfono: {{ $triaje[0]->acoTelefono }}
                                <br>Correo: {{ $triaje[0]->acoCorreo }}
                                <br>Dirección: {{ $triaje[0]->acoDireccion }}
                                <br>Fecha de Nacimiento: {{ $triaje[0]->acoFechaNaciemiento }}
                                <br>Edad: {{ $triaje[0]->acoEdad }}
                            </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                Datos de la Cita
                <address>
                    <strong>{{ $triaje[0]->citEstado }}</strong>
                    <br>Estado: {{ $triaje[0]->citMorivo }}
                    <br>Hora de Atención: {{ $triaje[0]->citHoraAtencion }}
                </address>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <p class="lead">Triaje:</p>
            <!-- Table row Para ASignar Tamaño al campo  style="width: 59%"-->
            <div class="row">
              <div class="col-xs-12 table">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>FUR</th>
                      <th>G</th>
                      <th>FAP</th>
                      <th>P</th>
                      <th>Método Anticonceptivo</th>
                      <th>Pulso</th>
                      <th>Temperatura</th>
                      <th>Talla</th>
                      <th>Peso</th>
                      <th>Presión Arterial</th>
                      <th>Alergias</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>{{ $triaje[0]->apeFechaUltimaRegla }}</td>
                      <td>{{ $triaje[0]->apeCantidaGestaciones }}</td>
                      <td>{{ $triaje[0]->apePapaNicolao }}</td>
                      <td>{{ $triaje[0]->psValoraap }} {{ $triaje[0]->psValorbap }} {{ $triaje[0]->psValorcap }} {{ $triaje[0]->psValordap }}</td>
                      <td>{{ $triaje[0]->mcNombreap }}</td>
                      <td>{{ $triaje[0]->fvPulso }}</td>
                      <td>{{ $triaje[0]->fvTemperatura }}</td>
                      <td>{{ $triaje[0]->fvTalla }}</td>
                      <td>{{ $triaje[0]->fvPeso }}</td>
                      <td>{{ $triaje[0]->parSistolicafv }}/{{ $triaje[0]->parDiastolicafv }}</td>
                      @foreach ($triaje as $tr)
                      <td>{{ $tr->aAlergia }},</td>    
                      @endforeach
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <p class="lead">Consulta:</p>
            <!-- Table row Para ASignar Tamaño al campo  style="width: 59%"-->
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                    
                        <div class="x_content">
        
        
                            <div class="col-md-12 col-sm-12 col-xs-12" role="tabpanel" data-example-id="togglable-tabs">
                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Datos de La Consulta</a>
                                </li>
                                <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Funciones Biológicas</a>
                                </li>
                                <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Inspecciones Generales</a>
                                </li>
                                <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Exámenes Clínicos</a>
                                </li>
                                <li role="presentation" class=""><a href="#tab_content5" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Exámenes Auxiliares</a>
                                </li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                                    <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                <th>Fecha de Consulta</th>
                                                <th>Hora</th>
                                                <th>Estado</th>
                                                <th>Motivo</th>
                                                <th>Tiempo de Enfermedad</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                <td>{{ $consultas[0]->cFecha }}</td>
                                                <td>{{ $consultas[0]->cHora }}</td>
                                                <td>{{ $consultas[0]->cEstado }}</td>
                                                <td>{{ $consultas[0]->cMotivo }}</td>
                                                <td>{{ $consultas[0]->cTiempo }}</td>
                                                </tr>
                                            </tbody>
                                    </table>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                                    <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                <th>Apetito</th>
                                                <th>Deposicion</th>
                                                <th>Sed</th>
                                                <th>Sueño</th>
                                                <th>Orina</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                <td>{{ $consultas[0]->aApetito }}</td>
                                                <td>{{ $consultas[0]->dDeposicion }}</td>
                                                <td>{{ $consultas[0]->sSed }}</td>
                                                <td>{{ $consultas[0]->suSueño }}</td>
                                                <td>{{ $consultas[0]->oOrina }}</td>
                                                </tr>
                                            </tbody>
                                    </table>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                    <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                <th>Cabeza</th>
                                                <th>Cuello</th>
                                                <th>Torax</th>
                                                <th>Mamas</th>
                                                <th>Pulmones y Cardio</th>
                                                <th>Abdomen</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                <td>Normal</td>
                                                <td>Normal</td>
                                                <td>Normal</td>
                                                <td>Normal</td>
                                                <td>Normal</td>
                                                <td>Normal</td>
                                                </tr>
                                            </tbody>
                                    </table>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
                                        <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                    <th>Ge y Bus</th>
                                                    <th>Cervix</th>
                                                    <th>Ovarios</th>
                                                    <th>Vagina</th>
                                                    <th>Utero</th>
                                                    <th>Fondo Saco</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                    <td>{{ $consultas[0]->egGeyBus }}</td>
                                                    <td>{{ $consultas[0]->egCervix }}</td>
                                                    <td>{{ $consultas[0]->egOvarios }}</td>
                                                    <td>{{ $consultas[0]->egVagina }}</td>
                                                    <td>{{ $consultas[0]->egUtero }}</td>
                                                    <td>{{ $consultas[0]->egFondoSeco }}</td>
                                                    </tr>
                                                </tbody>
                                        </table>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content5" aria-labelledby="profile-tab">
                                      <table class="table table-striped">
                                              <thead>
                                                  <tr>
                                                  <th>Nombre</th>
                                                  <th>Descripción</th>
                                                  <th>Administrar</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                @foreach ($examenAux as $ea)
                                                  <tr>
                                                    <td>{{ $ea->nombre }}</td>
                                                    <td>{{ $ea->detalle }}</td>
                                                    <td>
                                                    <a type="button"class="btn btn-xs btn-primary" hr data-placement="top" data-toggle="tooltip" data-original-title="Mostrar Archivo {{ $ea->id }}" onclick="mostrarExamen('{{ $ea->ruta }}')"><i class="fa fa-eyes-o">VER</i></a>
                                                    <a type="button"class="btn btn-xs btn-primary" hr data-placement="top" data-toggle="tooltip" data-original-title="Abrir Archivo {{ $ea->id }}" onclick="abrirExamem('{{$ea->ruta}}')"><i class="fa fa-eyes-o">ABRIR {{$ea->ruta}}</i></a>
                                                    <a type="button" href="{{ route('downloadExamenAuxiliar', " $ea->id " ) }}" class="btn btn-xs btn-primary" hr data-placement="top" data-toggle="tooltip" data-original-title="Descargar Archivo {{ $ea->id }}"><i class="fa fa-download"></i></a></td>
                                                  </tr>
                                                @endforeach
                                              </tbody>
                                      </table>
                                  </div>
                            </div>
                            </div>
        
                        </div>
                        </div>
                    </div>

              <div class="col-xs-12 table">
                
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            

            <div class="row">
              <!-- accepted payments column -->
              <div class="col-xs-6">
                <p class="lead">Diagnostico</p>
                <div class="table-responsive">
                    <table class="table table-striped">
                            <thead>
                                <tr>
                                <th>Código</th>
                                <th>Descripcion</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($diagnostico as $dia)
                                <tr>
                                    <td>{{ $dia->Codigo }}</td>
                                    <td>{{ $dia->Descripcion }}</td>
                                </tr>    
                                @endforeach
                            </tbody>
                    </table>
                </div>
              </div>

              
              <!-- /.col -->
              <div class="col-xs-6">
                <p class="lead">Tratamiento</p>
                <div class="table-responsive">
                    <table class="table table-striped">
                            <thead>
                                <tr>
                                <th>Medicamento</th>
                                <th>Tratamiento</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tratamientos as $tr)
                                <tr>
                                    <td>{{ $tr->Medicamento }}</td>
                                    <td>{{ $tr->Indicacion }}</td>
                                </tr>    
                                @endforeach
                            </tbody>
                    </table>
                </div>
              </div>
              <div class="col-xs-6">
                <p class="lead">Observacion:</p>
                <div class="col-xs-6">
                    <div class="table-responsive">
                        <table class="table">
                        <tbody>
                            <tr>
                            <th style="width:50%">Observacion:</th>
                            @foreach ($observacion as $obs)
                                <td>{{ $obs->nombre }}</td>    
                            @endforeach
                            </tr>
                        </tbody>
                        </table>
                    </div>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- this row will not appear when printing -->
            <div class="row no-print">
              <div class="col-xs-12">
                <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Imprimir</button>
                <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generar PDF</button>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>
  <!-- Aqui quiero mostrar pdf por id -->
  <div class="modal inmodal" id="verExamen" tabindex="-1" role="dialog" aria-hidden="true" >
    <div class="modal-dialog" style="height: 1000px; width: 90%;">
        <div class="modal-content animated flipInY" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Ecografia Abdominal</h4>
            </div>
            <div class="modal-body" width="100%" height="100%" style="height: 1000px; width: 100%;">
                <embed src="{{$examenAux[2]->ruta}}" type="application/pdf" width="100%" height="100%"/>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

@endsection



@section('script')
    <script>
        function mostrarExamen(id) {
            $('#verExamen').modal('show');
        }    
        
        function abrirExamem(ruta){
            window.open(ruta, '_blank');
           //window.open('../ANEXO_IV.pdf', '_blank');
            //window.open('{{ route('verExam', " $ea->id " ) }}', '_blank');
        }
    
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