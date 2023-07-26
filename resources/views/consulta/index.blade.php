@extends('layouts.base')    
@section('title')
 Consulta    
@endsection
@section('contenido')
    
<div class="col-md-12 col-sm-12 col-xs-12" role="main"> 
  <div class=""><div class="clearfix"></div>
    <div class="page-title">
      <div class="col-md-6 col-sm-12 col-xs-12 profile_details">
        <div class="well profile_view col-md-12 col-sm-12 col-xs-12">
          <div class="col-sm-12">   
            <div class="left col-xs-7">
              <h2>{{$datosPersonales[0]->nombre}}</h2>
              <ul class="list-unstyled">
                <li><i class="fa fa-building"></i> DNI: {{$datosPersonales[0]->dni}}</li>
                <br>
              </ul>
            </div>
          </div>
            <div class="col-xs-12 bottom text-center">
            Paciente 
            </div>
        </div>
      </div>    
      <div class="col-md-6 col-sm-12 col-xs-12 profile_details">
          <div class="well profile_view col-md-12 col-sm-12 col-xs-12">
            <div class="col-sm-12">
              <div class="left col-xs-7">
                <h2>{{$acompanate[0]->nombre}}</h2>
                <ul class="list-unstyled">
                  <li><i class="fa fa-building"></i> DNI: {{$acompanate[0]->dni}}</li>
                  <li><i class="fa fa-phone"></i> Parentezco: {{$acompanate[0]->parentezco}}</li>
                </ul>
              </div>
            </div>
              <div class="col-xs-12 bottom text-center">
                Acompañante
              </div>
          </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12 profile_details">
            <div class="well profile_view col-md-12 col-sm-12 col-xs-12">
              <div class="col-sm-12">
                <div class="left col-xs-6">
                    <div class="x_panel">
                        <h4>Personales</h4>
                        <div class="x_content">
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                <th>FUR</th>
                                <th>G</th>
                                <th>P-1</th>
                                <th>p-2</th>
                                <th>P-3</th>
                                <th>p-4</th>
                                <th>PAP</th>
                                <th>MAC</th>
                              </tr>
                            </thead>
                            <tbody>
                                <tr>
                                      <td>{{ $historiaClinica[0]->FecUltimaRegla }}</td>
                                      <td>{{ $historiaClinica[0]->CanGestaciones }}</td>
                                      <td>{{ $historiaClinica[0]->ValorA }}</td>
                                      <td>{{ $historiaClinica[0]->ValorB }}</td>
                                      <td>{{ $historiaClinica[0]->ValorC }}</td>
                                      <td>{{ $historiaClinica[0]->ValorD }}</td>
                                      <td>{{ $historiaClinica[0]->FecPapaNicolao }}</td>
                                      <td>{{ $historiaClinica[0]->MetodoAnticonceptivo }}</td>
                                 </tr>      
                              
                            </tbody>
                          </table>
                        </div>
                      </div>
                </div>
                <div class="right col-xs-6">
                <div class="x_panel">
                    <h4>Patológicos</h4>
                    <div class="x_content">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>Antecedente</th>
                          </tr>
                        </thead>
                        <tbody>
                            <tr>
                                  <td>{{ $historiaClinica[0]->Detalle }}</td>
                             </tr>          
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="left col-xs-6">
                    <div class="x_panel">
                        <h4>Alergias Médicas</h4>
                        <div class="x_content">
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                <th>Alergia</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($alergias as $ale)
                                <tr>
                                  <td>{{ $ale->alergia }}</td>
                                 </tr>      
                                 @endforeach
                            </tbody>
                          </table>
                        </div>
                      </div>
                </div>
                <div class="right col-xs-6">
                <div class="x_panel">
                    <h4>Exámen Clinico</h4>
                    <div class="x_content">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>Presion Arterial</th>
                            <th>Pulso</th>
                            <th>Temperatura</th>
                            <th>Talla</th>
                            <th>Peso</th>
                          </tr>
                        </thead>
                        <tbody>
                            <tr>
                                  <td>{{ $historiaClinica[0]->sistolica }}/{{ $historiaClinica[0]->diastolica }}</td>
                                  <td>{{ $historiaClinica[0]->pulso }}</td>
                                  <td>{{ $historiaClinica[0]->temperatura }}</td>
                                  <td>{{ $historiaClinica[0]->talla }}</td>
                                  <td>{{ $historiaClinica[0]->peso }}</td>
                             </tr>      
                          
                        </tbody>
                      </table>
                    </div>
                  </div>    
                </div>
              </div>
                <div class="col-xs-12 bottom text-center">
                  TRIAJE
                </div>
            </div>
          </div>
    </div>
      <div class="row">
        <div class="col-md-12">
          <div class="x_panel">
            <div class="x_title">
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
              <div class="row">
                <div class="col-sm-3 mail_list_column">
                  <form class="form-horizontal form-label-left" id="feedback_form" method="POST" action="/consulta/store">
                    {!! csrf_field() !!}
                    
                  <div class="x_content">

                      <div class="col-xs-12">
                        <!-- required for floating -->
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs tabs-left">
                            <div class="row">
                                <div class="btn-group-vertical">
                                  <a class="btn btn-sm btn-default" href="#exBio" data-toggle="tab">Consulta</a>
                                  <a class="btn btn-sm btn-default" href="#diag" data-toggle="tab" onclick="mantenerConsulta()">Diagnóstico</a>
                                  <a class="btn btn-sm btn-default" href="#obser" data-toggle="tab">Observaciones</a>
                                  <a class="btn btn-sm btn-default" href="#exAux" data-toggle="tab">Orden de Exámen Externo</a>
                                  <a class="btn btn-sm btn-default" href="#exInternos" data-toggle="tab">Examen Auxiliar</a>
                                </div>
                            </div>
                         
                        </ul>
                      </div>
                      <div class="clearfix"></div>
  
                    </div>
                    <input type="text" class="hidden" value="{{ $datosPersonales[0]->idCita }}" name="Dato" id="idCita">
                    <button class="btn btn-sm btn-primary btn-block" type="button" onclick="finalizarConsulta()">Cerrar Consulta</button>
                  </form>
                  
                </div>
                <!-- /MAIL LIST -->

                <!-- CONTENT MAIL -->
                <div class="col-sm-9 tab-pane active" id="consulta">

                    <div class="col-xs-12">
                        <!-- Tab panes -->
                        <div class="tab-content">
                          <div class="tab-pane active" id="exBio">
                            <p class="lead">CONSULTA</p>
                            <div class="panel">
                                  <div class="panel-body">
                                      <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                          <div class="col-md-10 col-sm-10 col-xs-12 form-group">
                                              <label class="control-label col-md-12 col-sm-12 col-xs-12">Motivo de Consulta</label>
                                              <div class="col-md-12 col-sm-12 col-xs-12">
                                                  <textarea class="form-control" rows="3" placeholder="Ingresar Motivo" id="motivo"></textarea>
                                              </div>
                                          </div>
                                          <div class="col-md-10 col-sm-10 col-xs-12 form-group">
                                              <label class="control-label col-md-12 col-sm-12 col-xs-12">Tiempo</label>
                                              <div class="col-md-12 col-sm-12 col-xs-12">
                                                <input type="text" class="form-control" placeholder="Tiempo de Enfermedad" id="tiempo">
                                              </div>
                                          </div> 
                                      </div>
                                  </div>
                                
                            </div>
                            <p class="lead">Funciones Biológicas</p>
                            <div class="panel">
                                  <div class="panel-body">
                                      <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                          <div class="col-md-5 col-sm-5 col-xs-12 form-group">
                                              <select class='form-control center' id='ap' name='estadocivils_id'>
                                                  <option value="">Seleccione Ap..</option>
                                                  @foreach ($ap as $ap)
                                                  <option value="{{ $ap->id }}">{{ $ap->nombre }}</option>
                                                  @endforeach
                                              </select>
                                          </div>
                                          <div class="col-md-5 col-sm-5 col-xs-12 form-group">
                                              <select class='form-control center' id='sed' name='estadocivils_id'>
                                                  <option value="">Seleccione Sed..</option>
                                                  @foreach ($sed as $sed)
                                                  <option value="{{ $sed->id }}">{{ $sed->nombre }}</option>
                                                  @endforeach
                                              </select>
                                          </div>
                                          <div class="col-md-5 col-sm-5 col-xs-12 form-group">
                                              <select class='form-control center' id='sueño' name='estadocivils_id'>
                                                  <option value="">Seleccione Sueño..</option>
                                                  @foreach ($sueño as $su)
                                                  <option value="{{ $su->id }}">{{ $su->nombre }}</option>
                                                  @endforeach
                                              </select>
                                          </div>
                                          <div class="col-md-5 col-sm-5 col-xs-12 form-group">
                                              <select class='form-control center' id='orina' name='estadocivils_id'>
                                                  <option value="">Seleccione Orina..</option>
                                                  @foreach ($orina as $or)
                                                  <option value="{{ $or->id }}">{{ $or->nombre }}</option>
                                                  @endforeach
                                              </select>
                                          </div>
                                          <div class="col-md-10 col-sm-10 col-xs-12 form-group">
                                              <select class='form-control center' id='deposicion' name='estadocivils_id'>
                                                  <option value="">Seleccione Deposicion..</option>
                                                  @foreach ($deposicion as $dep)
                                                  <option value="{{ $dep->id }}">{{ $dep->nombre }}</option>
                                                  @endforeach
                                              </select>
                                          </div> 
                                      </div>
                                  </div>
                                
                            </div>
                            <p class="lead">Inspecciones Generales</p>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <input type="text" class="form-control" placeholder="Descripcion de Inspecciones Generales" id="detalleInspGenerales">
                             </div>
                            <div class="panel">
                                  <div class="panel-body">
                                      <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                          <div class="col-md-5 col-sm-5 col-xs-12 form-group">
                                              <label class="control-label col-md-12 col-sm-12 col-xs-12">Cabeza</label>
                                              <div class="col-md-12 col-sm-12 col-xs-12">
                                                  <textarea class="form-control" rows="3" placeholder="Analisis de Cabeza" id="cabeza"></textarea>
                                              </div>
                                          </div>
                                          <div class="col-md-5 col-sm-5 col-xs-12 form-group">
                                              <label class="control-label col-md-12 col-sm-12 col-xs-12">Cuello</label>
                                              <div class="col-md-12 col-sm-12 col-xs-12">
                                                <textarea class="form-control" rows="3" placeholder="Analisis de Cuello" id="cuello"></textarea>
                                              </div>
                                          </div>
                                          <div class="col-md-5 col-sm-5 col-xs-12 form-group">
                                              <label class="control-label col-md-12 col-sm-12 col-xs-12">Torax</label>
                                              <div class="col-md-12 col-sm-12 col-xs-12">
                                                <textarea class="form-control" rows="3" placeholder="Analisis de Torax" id="torax"></textarea>
                                              </div>
                                          </div>
                                          <div class="col-md-5 col-sm-5 col-xs-12 form-group">
                                              <label class="control-label col-md-12 col-sm-12 col-xs-12">Mamas</label>
                                              <div class="col-md-12 col-sm-12 col-xs-12">
                                                <textarea class="form-control" rows="3" placeholder="Analisis de Mamas" id="mamas"></textarea>
                                              </div>
                                          </div>
                                          <div class="col-md-5 col-sm-5 col-xs-12 form-group">
                                              <label class="control-label col-md-12 col-sm-12 col-xs-12">Pulmones Y Cardiovascular</label>
                                              <div class="col-md-12 col-sm-12 col-xs-12">
                                                <textarea class="form-control" rows="3" placeholder="Analisis de Pulmones y Cardiovascular" id="pulmoncardio"></textarea>
                                              </div>
                                          </div>
                                          <div class="col-md-5 col-sm-5 col-xs-12 form-group">
                                              <label class="control-label col-md-12 col-sm-12 col-xs-12">Abdomen</label>
                                              <div class="col-md-12 col-sm-12 col-xs-12">
                                                <textarea class="form-control" rows="3" placeholder="Analisis de Abdomen" id="abdomen"></textarea>
                                              </div>
                                          </div> 
                                      </div>
                                  </div>
                                
                            </div>

                            <p class="lead">Exámenes Ginecologicos</p>
                            <div class="panel">
                                  <div class="panel-body">
                                      <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                          <div class="col-md-5 col-sm-5 col-xs-12 form-group">
                                              <label class="control-label col-md-12 col-sm-12 col-xs-12">GE y BUS</label>
                                              <div class="col-md-12 col-sm-12 col-xs-12">
                                                <textarea class="form-control" rows="3" placeholder="GE y BUS" id="geybus"></textarea>
                                              </div>
                                          </div>
                                          <div class="col-md-5 col-sm-5 col-xs-12 form-group">
                                              <label class="control-label col-md-12 col-sm-12 col-xs-12">Cervix</label>
                                              <div class="col-md-12 col-sm-12 col-xs-12">
                                                <textarea class="form-control" rows="3" placeholder="Cervix" id="cervix"></textarea>
                                              </div>
                                          </div>
                                          <div class="col-md-5 col-sm-5 col-xs-12 form-group">
                                              <label class="control-label col-md-12 col-sm-12 col-xs-12">Ovarios</label>
                                              <div class="col-md-12 col-sm-12 col-xs-12">
                                                <textarea class="form-control" rows="3" placeholder="Ovarios" id="ovarios"></textarea>
                                              </div>
                                          </div>
                                          <div class="col-md-5 col-sm-5 col-xs-12 form-group">
                                              <label class="control-label col-md-12 col-sm-12 col-xs-12">Vagina</label>
                                              <div class="col-md-12 col-sm-12 col-xs-12">
                                                <textarea class="form-control" rows="3" placeholder="Vagina" id="vagina"></textarea>
                                              </div>
                                          </div>
                                          <div class="col-md-5 col-sm-5 col-xs-12 form-group">
                                              <label class="control-label col-md-12 col-sm-12 col-xs-12">Útero</label>
                                              <div class="col-md-12 col-sm-12 col-xs-12">
                                                <textarea class="form-control" rows="3" placeholder="Analisis de Útero" id="utero"></textarea>
                                              </div>
                                          </div>
                                          <div class="col-md-5 col-sm-5 col-xs-12 form-group">
                                              <label class="control-label col-md-12 col-sm-12 col-xs-12">Fondo de Saco</label>
                                              <div class="col-md-12 col-sm-12 col-xs-12">
                                                <textarea class="form-control" rows="3" placeholder="Fondo de Saco" id="fondosaco"></textarea>
                                              </div>
                                          </div> 
                                      </div>
                                  </div>
                                
                            </div>
                              
                          </div>

                          <div class="modal fade bs-examen-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                              {!! Form::open(['route' => 'examenginecologico.store', 'files' => true, 'class' => "form-horizontal form-label-left input_mask", 'enctype' => "multipart/form-data"]) !!}
                                  {!! csrf_field() !!}
                                <div class="modal-dialog modal-lg">
                                  <div class="modal-content">
                        
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                      </button>
                                      <h4 class="modal-title" id="myModalLabel">Registrar Exámen Realizado</h4>
                                      <input type="text" class="hidden" value="{{ $datosPersonales[0]->idCita }}" name="idCitas">
                                      <input type="text" class="hidden" value="{{ $idConsulta[0]->id }}" name="idConsulta">
                                      
                                    </div>
                                    <div class="modal-body">
                                        <label class="control-label">Tipo de Exámen: </label>
                                        
                                             
                                        
                                      <label class="control-label">Resultados: </label>
                                        <input type="text" class="form-control" placeholder="Resultado de Exámen" name="resultadoExamen">
                                      <label class="control-label">Tipo de Documento: </label>
                                        <label class="control-label">Ruta: </label>
                                        <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="fa fa-picture-o"></i></a>
                                        <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" name="documento"/>
                                    </div>
    
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                      <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                        
                                  </div>
                                </div>
                                {!! Form::close() !!}
                              </div>
                          
                          
                          <div class="tab-pane" id="diag">
                            <p class="lead">Diagnóstico</p>
                              <input type="text" class="form-control has-feedback-left hidden" id="consulta"  name="consultas_id" value="{{ $idConsulta[0]->id }}">
                              <input type="text" class="form-control has-feedback-left hidden" id="idCies" name="id">
                            <div class="panel">
                                  <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                    <input autocomplete="off" type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Detalle CIE" name="descripcion">
                                    <div id="diagnosticolist"></div>
                                  </div>
                                  {{  csrf_field() }}
                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <input autocomplete="off" type="text" class="form-control" placeholder="CIE" name="search" minlength="3" maxlength="4" id="search" onkeyup="Enter(event)" />
                                  </div>
                                  <div class="btn-group">
                                      <button type="button" class="btn btn-sm btn-dark" onclick="diagnostico()"> <i class="fa fa-check"></i></button>
                                  </div>
                                  <div class="x_content" id="divDiagnostico">
                                      <table class="table table-hover">
                                        <thead>
                                          <tr>
                                            <th>#</th>
                                            <th>Codigo</th>
                                            <th>Descripción</th>
                                            <th>Administración</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          @foreach ($diagnostico as $dia)
                                            <tr>
                                              <th scope="row">{{ $dia->Numeracion }}</th>
                                              <td>{{ $dia->Codigo }}</td>
                                              <td>{{ $dia->Descripcion }}</td>
                                              <td><button type="button" class="btn btn-sm btn-danger" onclick="eliminarDiagnostico({{ $dia->idCieConsulta }})" data-placement="top" data-toggle="tooltip" data-original-title="Eliminar {{$dia->Codigo}}"><i class="fa fa-trash"></i></button></td>
                                            </tr>    
                                          @endforeach
                                        </tbody>
                                      </table>
                  
                                    </div>
                                   
                            </div>
                            
                            <input type="text" class="form-control has-feedback-left hidden" id="consulta"  name="consultas_id" value="{{ $idConsulta[0]->id }}">
                            <div class="panel">
                              
                                <div class="panel-body">
                                    
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <p class="lead">Tratamientos</p>
                                        <label class="control-label">Medicamento: </label>
                                        <button type="button" class="btn btn-sm btn-dark" onclick="guardarTratamiento()"><i class="fa fa-check"></i></button>
                                        <a type="button" class="btn btn-sm btn-default" href="{{ Route('receta',[$datosPersonales[0]->idCita]) }}" target="_blank"><i class="fa fa-print"></i></a>
                                        <select class='form-control center' id='medicamentos_id' name='medicamentos_id'>
                                            <option>Seleccionar Medicamento</option>
                                            @foreach ($medicamento as $me)
                                            <option value="{{ $me->id }}">{{ $me->nombre }}</option>
                                            @endforeach
                                        </select>
                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                            <label class="control-label col-md-12 col-sm-12 col-xs-12">Cantidad</label>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                              <input type="text" class="form-control" placeholder="Cantidad" id="cantidad" name="cantidad">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                            <label class="control-label col-md-12 col-sm-12 col-xs-12">Dosis</label>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                              <input type="text" class="form-control" placeholder="Dosis" id="dosis" name="dosis">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                            <label class="control-label col-md-12 col-sm-12 col-xs-12">Via</label>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                              <input type="text" class="form-control" placeholder="Via" id="via" name="via">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                            <label class="control-label col-md-12 col-sm-12 col-xs-12">Frecuencia</label>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                              <input type="text" class="form-control" placeholder="Frecuencia" id="frecuencia" name="frecuencia">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                            <label class="control-label col-md-12 col-sm-12 col-xs-12">Duración</label>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                              <input type="text" class="form-control" placeholder="Duración" id="duracion" name="duracion">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12 col-sm-12 col-xs-12">    
                                        <textarea class="form-control" rows="3" placeholder="Ingresar Tratamiento" name="tdescripcion" id="indicaciones"></textarea>
                                        <input type="text" value="1" id="medicamentos" class="hidden">
                                        <input type="text" value="{{ $idConsulta[0]->id }}" id="consultas_id" class="hidden">
                                    </div>
                                    <div class="x_content" id="tablaTratamiento">
                                        <table class="table table-hover">
                                          <thead>
                                            <tr>
                                              <th>#</th>
                                              <th>Codigo</th>
                                              <th>Descripción</th>
                                              <th>Administración</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            @foreach ($recetaMedica as $rm)
                                              <tr>
                                                <th scope="row">{{ $rm->Numeracion }}</th>
                                                <td>{{ $rm->medicamento }}</td>
                                                <td>{{ $rm->indicacion }}</td>
                                                <td><button type="button" class="btn btn-sm btn-danger" onclick="eliminarTratamiento({{ $rm->tratamientos_id }})" data-placement="top" data-toggle="tooltip" data-original-title="Eliminar {{$rm->medicamento}}"><i class="fa fa-trash"></i></button></td>
                                              </tr>    
                                            @endforeach
                                          </tbody>
                                        </table>
                    
                                      </div>
                                </div>
                                   
                            </div>
                              

                          </div>
                          <div id = "notificacion_resul_trata"></div>
                        
                          <div class="tab-pane" id="exInternos"><p class="lead">Exámenes Auxilíares</p>
                            <div class="panel">
                                  <div class="panel-body">
                                      <div class="col-md-12 col-sm-12 col-xs-12">
                                          <label class="control-label">Exámen: </label>
                                          <button type="button" class="btn btn-sm btn-dark" data-toggle="modal" data-target=".bs-ExaAux-modal-lg"><i class="fa fa-plus"></i></button>
                                          <div class="clearfix"></div>
                                          <div class="col-md-12 col-sm-12 col-xs-12">
                                              <div class="x_panel">
                                                <div class="x_title">
                                                  <ul class="nav navbar-right panel_toolbox">
                                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                    </li>
                                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                    </li>
                                                  </ul>
                                                  <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content" id="divexamGine">
                                                  <table class="table table-hover">
                                                    <thead>
                                                      <tr>
                                                        <th>#</th>
                                                        <th>Tipo de Exámens</th>
                                                        <th>Gestión</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                      @foreach ($exaPendientes as $ep)
                                                      <tr>
                                                          <th scope="row">1</th>
                                                          <td>{{ $ep->nombre }}</td>
                                                          <td>
                                                            <div class="btn-group">
                                                              <button class="btn btn-default btn-xs" type="button" onclick="subirExaAux('{{ $ep->id }}')"><i class="fa fa-upload"></i></button>
                                                              <button class="btn btn-primary btn-xs" type="button" onclick="detalleExaAux()"><i class="fa fa-external-link"></i></button>
                                                              <button class="btn btn-danger btn-xs" type="button"><i class="fa fa-eraser"></i></button>
                                                            </div>
                                                          </td>
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
                          </div>

                          <div class="modal fade bs-ExaAux-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel">Exámenes Auxiliares</h4>
                                    <input Class="hidden" value="{{$paciente[0]->idPaciente}}" id="idPaciente" >
                                  </div>
                                  <div class="modal-body">
                                      <div class="table-responsive">
                                          <table class="table table-striped jambo_table bulk_action">
                                            <thead>
                                              <tr class="headings">
                                                <th>
                                                  <input type="checkbox" id="check-all" class="flat">
                                                </th>
                                                <th class="column-title">Tipo de Exámen Auxiliar </th>
                                                </th>
                                                <th class="bulk-actions" colspan="7">
                                                  <a class="antoo" style="color:#fff; font-weight:500;">Exámenes Seleccionados ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                                </th>
                                              </tr>
                                            </thead>
                    
                                            <tbody>
                                                @foreach ($exaAux as $ea)
                                              <tr class="even pointer">
                                                <td class="a-center ">
                                                  <input type="checkbox" class="checkbox flat" name="idExaAuxiliar[]" id="idExaAuxiliar" value="{{ $ea->id }}">
                                                </td>
                                                <td class=" ">{{ $ea->nombre }}</td>
                                                </td>
                                              </tr>
                                              @endforeach
                                            </tbody>
                                          </table>
                                        </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                    <a type="button" class="btn btn-primary" onclick="enviarExaAux()" data-dismiss="modal">Enviar</a>
                                  </div>
    
                                </div>
                              </div>
                          </div>
                          <form id="fExamAuxiliar" name="fExamAuxiliar" method="post" action="subirExamAuxiliar" class="formExamAuxiliar" enctype="multipart/form-data">
                            
                          <div class="modal fade bs-SubirExaAux-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="SubirExaAux">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel">...Nombre del Exámen...</h4>
                                  </div>
                                  <div class="modal-body">
                                      <input type="text" name="_token" id="_token" class="hidden" value="{{ csrf_token() }}">
                                      <input type="text" name="idcitamotivo" id="idcitamotivo" hidden value="{{ $citamotivo[0]->id }}">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre de Documento <span class="required">*</span>
                                      </label>
                                        <input type="text" id="nomExam" name="nomExam" required="required" class="form-control">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Descripcion <span class="required">*</span>
                                      </label>
                                      <textarea class="form-control" rows="3" placeholder="Ingrese una breve descripcion de su exámen" name="textResultado"></textarea>
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Documento <span class="required">*</span>
                                      </label>
                                        <input type="file" id="documento" required="required" class="form-control" name="documento">
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                  </div>
    
                                </div>
                              </div>
                          </div>
                        </form>


                          <!-- Ver Receta Médica -->
                          <div class="modal fade bs-verReceta-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel">Receta Médica</h4>
                                  </div>
                                  <div class="modal-body">
                                      <div class="x_content">
                                          <table class="table table-hover">
                                            <thead>
                                              <tr>
                                                <th>Medicamento</th>
                                                <th>Indicación</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($recetaMedica as $rm)
                                                <tr>
                                                  <td>{{ $rm->medicamento }}</td>
                                                  <td>{{ $rm->indicacion }}</td>
                                                </tr>    
                                                @endforeach
                                            </tbody>
                                          </table>
                                        </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                    <a type="button" class="btn btn-primary" href="{{ route('tratamiento.recetapdf',[$idConsulta[0]->id]) }}"><i class="fa fa-print"></i></a>
                                  </div>
    
                                </div>
                              </div>
                            </div>
                          <div class="tab-pane" id="exAux"><p class="lead">Orden De Exámen Externo</p>
                            <div class="panel">
                                  <h4 class="panel-title">Registrar Orden de Exámen Externo</h4>
                                  <div class="panel-body">
                                      <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                          <div class="btn-group  btn-group-sm">
                                              <button class="btn btn-default" type="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Emitir Orden de Exámen</button>
                                            </div>
                                            <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                                <div class="panel">
                                                  <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                                    <div class="panel-body">
                                                        <div class="accordion" id="accordion1" role="tablist" aria-multiselectable="true">
                                                            <div class="panel col-md-6 col-sm-12 col-xs-12">
                                                              <a class="panel-heading" role="tab" id="headingOne1" data-toggle="collapse" data-parent="#accordion1" href="#cBioquimico" aria-expanded="false" aria-controls="collapseOne">
                                                                <h4 class="panel-title alert alert-success">BIOQUIMICO</h4>
                                                              </a>
                                                              <div id="cBioquimico" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                                                <div class="panel-body">
                                                                    <table class="table table-bordered">
                                                                      <thead>
                                                                        <tr>
                                                                          <th>#</th>
                                                                          <th>Exámen</th>
                                                                        </tr>
                                                                      </thead>
                                                                      <tbody>
                                                                        @foreach ($bioquimica as $item)
                                                                          <tr>
                                                                            <td class="a-center ">
                                                                                  <input type="checkbox" class="flat chekboxses" name="idExaExterno[]" id="idExaExterno" value="{{$item->id}}">
                                                                            </td>
                                                                            <td>{{$item->nombre}}</td>
                                                                          </tr>    
                                                                        @endforeach
                                                                      </tbody>
                                                                    </table>
                                                                </div>
                                                              </div>
                                                            </div>
                                                            <div class="panel col-md-6 col-sm-12 col-xs-12 col-sm-12 col-xs-12">
                                                              <a class="panel-heading collapsed" role="tab" id="headingTwo1" data-toggle="collapse" data-parent="#accordion1" href="#cHemtologia" aria-expanded="false" aria-controls="collapseTwo">
                                                                <h4 class="panel-title alert alert-info">HEMATOLOGÍA</h4>
                                                              </a>
                                                              <div id="cHemtologia" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                                <div class="panel-body">
                                                                    <table class="table table-bordered">
                                                                      <thead>
                                                                        <tr>
                                                                          <th>#</th>
                                                                          <th>Exámen</th>
                                                                        </tr>
                                                                      </thead>
                                                                      <tbody>
                                                                        @foreach ($hematologia as $item)
                                                                          <tr>
                                                                            <td class="a-center ">
                                                                                  <input type="checkbox" class="flat chekboxses" name="idExaExterno[]" id="idExaExterno" value="{{$item->id}}">
                                                                            </td>
                                                                            <td>{{$item->nombre}}</td>
                                                                          </tr>    
                                                                        @endforeach
                                                                      </tbody>
                                                                    </table>
                                                                </div>
                                                              </div>
                                                            </div>
                                                            <div class="panel col-md-6 col-sm-12 col-xs-12">
                                                              <a class="panel-heading collapsed" role="tab" id="headingThree1" data-toggle="collapse" data-parent="#accordion1" href="#cInmunologia" aria-expanded="false" aria-controls="collapseThree">
                                                                <h4 class="panel-title alert alert-success">INMUNILOGIA</h4>
                                                              </a>
                                                              <div id="cInmunologia" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                                <div class="panel-body">
                                                                    <table class="table table-bordered">
                                                                      <thead>
                                                                        <tr>
                                                                          <th>#</th>
                                                                          <th>Exámen</th>
                                                                        </tr>
                                                                      </thead>
                                                                      <tbody>
                                                                        @foreach ($inmunologia as $item)
                                                                          <tr>
                                                                            <td class="a-center ">
                                                                                  <input type="checkbox" class="flat chekboxses" name="idExaExterno[]" id="idExaExterno" value="{{$item->id}}">
                                                                            </td>
                                                                            <td>{{$item->nombre}}</td>
                                                                          </tr>    
                                                                        @endforeach
                                                                      </tbody>
                                                                    </table>
                                                                </div>
                                                              </div>
                                                            </div>
                                                            <div class="panel col-md-6 col-sm-12 col-xs-12">
                                                                <a class="panel-heading collapsed" role="tab" id="headingThree1" data-toggle="collapse" data-parent="#accordion1" href="#cEndocrinologia" aria-expanded="false" aria-controls="collapseThree">
                                                                  <h4 class="panel-title alert alert-info">ENDOCRINOLOGÍA</h4>
                                                                </a>
                                                                <div id="cEndocrinologia" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                                  <div class="panel-body">
                                                                      <table class="table table-bordered">
                                                                        <thead>
                                                                          <tr>
                                                                            <th>#</th>
                                                                            <th>Exámen</th>
                                                                          </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                          @foreach ($endocrinologia as $item)
                                                                            <tr>
                                                                              <td class="a-center ">
                                                                                    <input type="checkbox" class="flat chekboxses" name="idExaExterno[]" id="idExaExterno" value="{{$item->id}}">
                                                                              </td>
                                                                              <td>{{$item->nombre}}</td>
                                                                            </tr>    
                                                                          @endforeach
                                                                        </tbody>
                                                                      </table>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                              <div class="panel col-md-6 col-sm-12 col-xs-12">
                                                                <a class="panel-heading collapsed" role="tab" id="headingThree1" data-toggle="collapse" data-parent="#accordion1" href="#cMarcaTumoral" aria-expanded="false" aria-controls="collapseThree">
                                                                  <h4 class="panel-title alert alert-success">M. TUMORÁLES</h4>
                                                                </a>
                                                                <div id="cMarcaTumoral" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                                  <div class="panel-body">
                                                                      <table class="table table-bordered">
                                                                        <thead>
                                                                          <tr>
                                                                            <th>#</th>
                                                                            <th>Exámen</th>
                                                                          </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                          @foreach ($marcatumor as $item)
                                                                            <tr>
                                                                              <td class="a-center ">
                                                                                    <input type="checkbox" class="flat chekboxses" name="idExaExterno[]" id="idExaExterno" value="{{$item->id}}">
                                                                              </td>
                                                                              <td>{{$item->nombre}}</td>
                                                                            </tr>    
                                                                          @endforeach
                                                                        </tbody>
                                                                      </table>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                              <div class="panel col-md-6 col-sm-12 col-xs-12">
                                                                <a class="panel-heading collapsed" role="tab" id="headingThree1" data-toggle="collapse" data-parent="#accordion1" href="#cMicrobiologia" aria-expanded="false" aria-controls="collapseThree">
                                                                  <h4 class="panel-title alert alert-info">MICROBIOLOGÍA</h4>
                                                                </a>
                                                                <div id="cMicrobiologia" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                                  <div class="panel-body">
                                                                      <table class="table table-bordered">
                                                                        <thead>
                                                                          <tr>
                                                                            <th>#</th>
                                                                            <th>Exámen</th>
                                                                          </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                          @foreach ($microbiologia as $item)
                                                                            <tr>
                                                                              <td class="a-center ">
                                                                                    <input type="checkbox" class="flat chekboxses" name="idExaExterno[]" id="idExaExterno" value="{{$item->id}}">
                                                                              </td>
                                                                              <td>{{$item->nombre}}</td>
                                                                            </tr>    
                                                                          @endforeach
                                                                        </tbody>
                                                                      </table>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                              <div class="panel col-md-6 col-sm-12 col-xs-12">
                                                                <a class="panel-heading collapsed" role="tab" id="headingThree1" data-toggle="collapse" data-parent="#accordion1" href="#cParasitologia" aria-expanded="false" aria-controls="collapseThree">
                                                                  <h4 class="panel-title alert alert-success">PARASITOLOGÍA</h4>
                                                                </a>
                                                                <div id="cParasitologia" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                                  <div class="panel-body">
                                                                      <table class="table table-bordered">
                                                                        <thead>
                                                                          <tr>
                                                                            <th>#</th>
                                                                            <th>Exámen</th>
                                                                          </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                          @foreach ($parasitologia as $item)
                                                                            <tr>
                                                                              <td class="a-center ">
                                                                                    <input type="checkbox" class="flat chekboxses" name="idExaExterno[]" id="idExaExterno" value="{{$item->id}}">
                                                                              </td>
                                                                              <td>{{$item->nombre}}</td>
                                                                            </tr>    
                                                                          @endforeach
                                                                        </tbody>
                                                                      </table>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                              <div class="panel col-md-6 col-sm-12 col-xs-12">
                                                                <a class="panel-heading collapsed" role="tab" id="headingThree1" data-toggle="collapse" data-parent="#accordion1" href="#cPLipidico" aria-expanded="false" aria-controls="collapseThree">
                                                                  <h4 class="panel-title alert alert-info">P. LIPÍDICO</h4>
                                                                </a>
                                                                <div id="cPLipidico" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                                  <div class="panel-body">
                                                                      <table class="table table-bordered">
                                                                        <thead>
                                                                          <tr>
                                                                            <th>#</th>
                                                                            <th>Exámen</th>
                                                                          </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                          @foreach ($lipidico as $item)
                                                                            <tr>
                                                                              <td class="a-center ">
                                                                                    <input type="checkbox" class="flat chekboxses" name="idExaExterno[]" id="idExaExterno" value="{{$item->id}}">
                                                                              </td>
                                                                              <td>{{$item->nombre}}</td>
                                                                            </tr>    
                                                                          @endforeach
                                                                        </tbody>
                                                                      </table>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                              <div class="panel col-md-6 col-sm-12 col-xs-12">
                                                                <a class="panel-heading collapsed" role="tab" id="headingThree1" data-toggle="collapse" data-parent="#accordion1" href="#cPHepatico" aria-expanded="false" aria-controls="collapseThree">
                                                                  <h4 class="panel-title alert alert-success">PERFIL HEPÁTICO</h4>
                                                                </a>
                                                                <div id="cPHepatico" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                                  <div class="panel-body">
                                                                      <table class="table table-bordered">
                                                                        <thead>
                                                                          <tr>
                                                                            <th>#</th>
                                                                            <th>Exámen</th>
                                                                          </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                          @foreach ($hepatico as $item)
                                                                            <tr>
                                                                              <td class="a-center ">
                                                                                    <input type="checkbox" class="flat chekboxses" name="idExaExterno[]" id="idExaExterno" value="{{$item->id}}">
                                                                              </td>
                                                                              <td>{{$item->nombre}}</td>
                                                                            </tr>    
                                                                          @endforeach
                                                                        </tbody>
                                                                      </table>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                              <div class="panel col-md-6 col-sm-12 col-xs-12">
                                                                <a class="panel-heading collapsed" role="tab" id="headingThree1" data-toggle="collapse" data-parent="#accordion1" href="#cPReumatologico" aria-expanded="false" aria-controls="collapseThree">
                                                                  <h4 class="panel-title alert alert-info">P. REUMATOLÓGICO</h4>
                                                                </a>
                                                                <div id="cPReumatologico" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                                  <div class="panel-body">
                                                                      <table class="table table-bordered">
                                                                        <thead>
                                                                          <tr>
                                                                            <th>#</th>
                                                                            <th>Exámen</th>
                                                                          </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                          @foreach ($reumatologico as $item)
                                                                            <tr>
                                                                              <td class="a-center ">
                                                                                    <input type="checkbox" class="flat chekboxses" name="idExaExterno[]" id="idExaExterno" value="{{$item->id}}">
                                                                              </td>
                                                                              <td>{{$item->nombre}}</td>
                                                                            </tr>    
                                                                          @endforeach
                                                                        </tbody>
                                                                      </table>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                              <div class="panel col-md-6 col-sm-12 col-xs-12">
                                                                <a class="panel-heading collapsed" role="tab" id="headingThree1" data-toggle="collapse" data-parent="#accordion1" href="#cPCoronario" aria-expanded="false" aria-controls="collapseThree">
                                                                  <h4 class="panel-title alert alert-success">PERFIL CORONÁRIO</h4>
                                                                </a>
                                                                <div id="cPCoronario" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                                  <div class="panel-body">
                                                                      <table class="table table-bordered">
                                                                        <thead>
                                                                          <tr>
                                                                            <th>#</th>
                                                                            <th>Exámen</th>
                                                                          </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                          @foreach ($coronario as $item)
                                                                            <tr>
                                                                              <td class="a-center ">
                                                                                    <input type="checkbox" class="flat chekboxses" name="idExaExterno[]" id="idExaExterno" value="{{$item->id}}">
                                                                              </td>
                                                                              <td>{{$item->nombre}}</td>
                                                                            </tr>    
                                                                          @endforeach
                                                                        </tbody>
                                                                      </table>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                              <div class="panel col-md-6 col-sm-12 col-xs-12">
                                                                <a class="panel-heading collapsed" role="tab" id="headingThree1" data-toggle="collapse" data-parent="#accordion1" href="#cPGestante" aria-expanded="false" aria-controls="collapseThree">
                                                                  <h4 class="panel-title alert alert-info">PERFIL GESTANTE</h4>
                                                                </a>
                                                                <div id="cPGestante" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                                  <div class="panel-body">
                                                                      <table class="table table-bordered">
                                                                        <thead>
                                                                          <tr>
                                                                            <th>#</th>
                                                                            <th>Exámen</th>
                                                                          </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                          @foreach ($gestante as $item)
                                                                            <tr>
                                                                              <td class="a-center ">
                                                                                    <input type="checkbox" class="flat chekboxses" name="idExaExterno[]" id="idExaExterno" value="{{$item->id}}">
                                                                              </td>
                                                                              <td>{{$item->nombre}}</td>
                                                                            </tr>    
                                                                          @endforeach
                                                                        </tbody>
                                                                      </table>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                              <div class="panel col-md-6 col-sm-12 col-xs-12">
                                                                <a class="panel-heading collapsed" role="tab" id="headingThree1" data-toggle="collapse" data-parent="#accordion1" href="#cPPrequirurgico" aria-expanded="false" aria-controls="collapseThree">
                                                                  <h4 class="panel-title alert alert-success">P. PREQUIRURGICO</h4>
                                                                </a>
                                                                <div id="cPPrequirurgico" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                                  <div class="panel-body">
                                                                      <table class="table table-bordered">
                                                                        <thead>
                                                                          <tr>
                                                                            <th>#</th>
                                                                            <th>Exámen</th>
                                                                          </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                          @foreach ($prequirurgico as $item)
                                                                            <tr>
                                                                              <td class="a-center ">
                                                                                    <input type="checkbox" class="flat chekboxses" name="idExaExterno[]" id="idExaExterno" value="{{$item->id}}">
                                                                              </td>
                                                                              <td>{{$item->nombre}}</td>
                                                                            </tr>    
                                                                          @endforeach
                                                                        </tbody>
                                                                      </table>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                              <div class="panel col-md-6 col-sm-12 col-xs-12">
                                                                <a class="panel-heading collapsed" role="tab" id="headingThree1" data-toggle="collapse" data-parent="#accordion1" href="#cPTiroideo" aria-expanded="false" aria-controls="collapseThree">
                                                                  <h4 class="panel-title alert alert-info">PERFIL TIROIDEO</h4>
                                                                </a>
                                                                <div id="cPTiroideo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                                  <div class="panel-body">
                                                                      <table class="table table-bordered">
                                                                        <thead>
                                                                          <tr>
                                                                            <th>#</th>
                                                                            <th>Exámen</th>
                                                                          </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                          @foreach ($tiroideo as $item)
                                                                            <tr>
                                                                              <td class="a-center ">
                                                                                    <input type="checkbox" class="flat chekboxses" name="idExaExterno[]" id="idExaExterno" value="{{$item->id}}">
                                                                              </td>
                                                                              <td>{{$item->nombre}}</td>
                                                                            </tr>    
                                                                          @endforeach
                                                                        </tbody>
                                                                      </table>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                              <div class="panel col-md-6 col-sm-12 col-xs-12">
                                                                <a class="panel-heading collapsed" role="tab" id="headingThree1" data-toggle="collapse" data-parent="#accordion1" href="#cPaqueteItu" aria-expanded="false" aria-controls="collapseThree">
                                                                  <h4 class="panel-title alert alert-success">PAQUETE ITU</h4>
                                                                </a>
                                                                <div id="cPaqueteItu" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                                  <div class="panel-body">
                                                                      <table class="table table-bordered">
                                                                        <thead>
                                                                          <tr>
                                                                            <th>#</th>
                                                                            <th>Exámen</th>
                                                                          </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                          @foreach ($paqueteitu as $item)
                                                                            <tr>
                                                                              <td class="a-center ">
                                                                                    <input type="checkbox" class="flat chekboxses" name="idExaExterno[]" id="idExaExterno" value="{{$item->id}}">
                                                                              </td>
                                                                              <td>{{$item->nombre}}</td>
                                                                            </tr>    
                                                                          @endforeach
                                                                        </tbody>
                                                                      </table>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                              <div class="panel col-md-6 col-sm-12 col-xs-12">
                                                                <a class="panel-heading collapsed" role="tab" id="headingThree1" data-toggle="collapse" data-parent="#accordion1" href="#cChequeoGeneral" aria-expanded="false" aria-controls="collapseThree">
                                                                  <h4 class="panel-title alert alert-info">CHEQUEO GENERAL</h4>
                                                                </a>
                                                                <div id="cChequeoGeneral" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                                  <div class="panel-body">
                                                                      <table class="table table-bordered">
                                                                        <thead>
                                                                          <tr>
                                                                            <th>#</th>
                                                                            <th>Exámen</th>
                                                                          </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                          @foreach ($chequegeneral as $item)
                                                                            <tr>
                                                                              <td class="a-center ">
                                                                                    <input type="checkbox" class="flat chekboxses" name="idExaExterno[]" id="idExaExterno" value="{{$item->id}}">
                                                                              </td>
                                                                              <td>{{$item->nombre}}</td>
                                                                            </tr>    
                                                                          @endforeach
                                                                        </tbody>
                                                                      </table>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                              
                                                              <div class="panel col-md-6 col-sm-12 col-xs-12">
                                                                <a class="panel-heading collapsed" role="tab" id="headingThree1" data-toggle="collapse" data-parent="#accordion1" href="#cPCoagulacion" aria-expanded="false" aria-controls="collapseThree">
                                                                  <h4 class="panel-title alert alert-success">P. DE COAGULACIÓN</h4>
                                                                </a>
                                                                <div id="cPCoagulacion" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                                  <div class="panel-body">
                                                                      <table class="table table-bordered">
                                                                        <thead>
                                                                          <tr>
                                                                            <th>#</th>
                                                                            <th>Exámen</th>
                                                                          </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                          @foreach ($coagulacion as $item)
                                                                            <tr>
                                                                              <td class="a-center ">
                                                                                    <input type="checkbox" class="flat chekboxses" name="idExaExterno[]" id="idExaExterno" value="{{$item->id}}">
                                                                              </td>
                                                                              <td>{{$item->nombre}}</td>
                                                                            </tr>    
                                                                          @endforeach
                                                                        </tbody>
                                                                      </table>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                              <div class="panel col-md-6 col-sm-12 col-xs-12">
                                                                <a class="panel-heading collapsed" role="tab" id="headingThree1" data-toggle="collapse" data-parent="#accordion1" href="#cGenetica" aria-expanded="false" aria-controls="collapseThree">
                                                                  <h4 class="panel-title alert alert-info">GENÉTICA</h4>
                                                                </a>
                                                                <div id="cGenetica" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                                  <div class="panel-body">
                                                                      <table class="table table-bordered">
                                                                        <thead>
                                                                          <tr>
                                                                            <th>#</th>
                                                                            <th>Exámen</th>
                                                                          </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                          @foreach ($genetica as $item)
                                                                            <tr>
                                                                              <td class="a-center ">
                                                                                    <input type="checkbox" class="flat chekboxses" name="idExaExterno[]" id="idExaExterno" value="{{$item->id}}">
                                                                              </td>
                                                                              <td>{{$item->nombre}}</td>
                                                                            </tr>    
                                                                          @endforeach
                                                                        </tbody>
                                                                      </table>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                          </div>
                                                    </div>
                                                    <div class="x_content">
                                                      <label class="control-label col-md-6 col-sm-6 col-xs-12">Recomendar un Laboratorio</label>
                                                        <select class="form-control" id="idLabSelect">
                                                          <option>Seleccionar Laboratorio...</option>
                                                          @foreach ($laboratorio as $lab)
                                                          <option value="{{ $lab->id }}">{{ $lab->nombre }}</option>    
                                                          @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="x_content">
                                                        <label class="control-label col-md-6 col-sm-6 col-xs-12">Fecha Recomendada</label>
                                                      <input type="date" class="form-control" id="fechaOrden">
                                                    </div>
                                                    <div class="x_content">
                                                      <button type="button" class="btn btn-default" onclick="CrearOrdenExamen()">Emitir</button>
                                                    </div>
                                                  </div>
                                                  
                                                </div>
                                                
                                              </div>
                                              
                                              
                                            
                                                
                                                  <div class="x_content" id="tabOrdenExam">
                                                    <table class="table table-hover">
                                                      <thead>
                                                        <tr>
                                                          <th>Fecha de Exámen</th>
                                                          <th>Médico</th>
                                                          <th>Estado</th>
                                                          
                                                          <th>Administrar</th>
                                                        </tr>
                                                      </thead>
                                                      <tbody>
                                                        @foreach ($ordenExamen as $oe)
                                                          <tr>
                                                            <td>{{ $oe->fechaOrden }}</td>
                                                            <td>{{ $oe->medico }}</td>
                                                            <td <?php if( $oe->estorden == "PENDIENTE"){ $estadoOrd = "label-danger"; }else{ $estadoOrd = "label-success"; } ?>><span class="label {{$estadoOrd}}">{{ $oe->estorden }}</span></td>
                                                           
                                                            <td>
                                                                <div class="btn-group">
                                                                  <button class="btn btn-default btn-xs" type="button" onclick="subirOrden('{{ $oe->orden_id }}')"><i class="fa fa-upload"></i></button>
                                                                  <button class="btn btn-primary btn-xs" type="button" onclick="detalleOrden()"><i class="fa fa-external-link"></i></button>
                                                                  <button class="btn btn-danger btn-xs" type="button"><i class="fa fa-eraser"></i></button>
                                                                </div>
                                                            </td>
                                                          </tr>
                                                        @endforeach
                                                      </tbody>
                                                    </table>
                                                    
                                                  </div>
                                                  <div id="divMostrarExam">

                                                  </div>                                              
                                        </div>
                                </div>
                            </div>
                          </div> 
                          <div class="tab-pane" id="obser"><p class="lead">Observaciones</p>
                            <div class="panel">
                                
                                  <div class="panel-body">
                                      <div class="col-md-12 col-sm-12 col-xs-12">
                                          <textarea class="form-control" rows="3" placeholder="Ingrese sus observaciones" name="odescripcion" id="nombreObservacion"></textarea>
                                        </div>
                                      
                                  </div>
                                
                              </div>
                              <div class="btn-group">
                                  <button type="button" class="btn btn-sm btn-dark" onclick="guardarObservacion()"><i class="fa fa-check"></i></button>
                              </div>
                              <div class="x_content" id="divObservacion">
                                  <table class="table table-hover">
                                    <thead>
                                      <tr>
                                        <th>#</th>
                                        <th>Detalle de la Observacion</th>
                                        <th>Administrar</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($observacion as $obs)
                                      <tr>
                                          <th scope="row">{{ $obs->Numeracion }}</th>
                                          <td>{{ $obs->nombre }}</td>
                                          <td><button type="button" class="btn btn-sm btn-danger" onclick="eliminarObservacion({{ $obs->id }})" data-placement="top" data-toggle="tooltip" data-original-title="Eliminar Observacion"><i class="fa fa-trash"></i></button></td>
                                        </tr>                                          
                                      @endforeach

                                    </tbody>
                                  </table>
              
                                </div>
                          </div>
                        </div>
                      </div>
                  
                </div>
                <!-- /CONTENT MAIL -->
                <div class="col-md-12 col-sm-12 col-xs-12 profile_details">
                    <div class="well profile_view col-md-12 col-sm-12 col-xs-12">
                        <div class="x_content">
                            <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th>Fecha Atención</th>
                                  <th>Motivo</th>
                                  <th>Tiempo Síntomas</th>
                                  <th>Ver Más</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($ListaConsultas as $lc)
                                <tr>
                                    <td>{{ $lc->FechaConsulta }}</td>
                                    <td>{{ $lc->MotivoConsulta }}</td>
                                    <td>{{ $lc->TiempoSintomas }}</td>
                                    <td><a href="{{ Route('consultaDetalle', [$lc->citas_id]) }}"><button type="button" class="btn btn-dark"><i class="fa fa-eye"></i></button></a></td>
                                  </tr>    
                                @endforeach
                              </tbody>
                            </table>
        
                          </div>
                        <div class="col-xs-12 bottom text-center">
                        Lista de Consultas Anteriores
                        </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>   
  
  <!-- MODAL TRIAJE -->
  <div class="modal fade bs-triaje-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">{{ $datosPersonales[0]->nombre }}</h4>
            </div>
            <div class="modal-body">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                   
                      <div class="x_content">
    
    
                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                          <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Paciente</a>
                            </li>
                            <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Acomapañante</a>
                            </li>
                            <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Antecedentes</a>
                            </li>
                          </ul>
                          <div id="myTabContent" class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                                <div class="col-md-12 col-sm-12 col-xs-12 profile_details">
                                    <div class="well profile_view">
                                      <div class="col-sm-12">
                                        <h4 class="brief"><i>{{ $paciente[0]->nombre }}</i></h4>
                                        <div class="left col-xs-12">
                                            <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                                                <p><strong>Fecha de Nacimiento: </strong> {{ $paciente[0]->fecnac }} </p>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-12 form-group">
                                                <p><strong>Edad: </strong> {{ $paciente[0]->edad }} </p>
                                            </div>
                                            <div class="col-md-4 col-sm-2 col-xs-12 form-group">
                                                <p><strong>Género: </strong> {{ $paciente[0]->genero }} </p>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-12 form-group">
                                                <p><strong>DNI: </strong> {{ $paciente[0]->dni }} </p>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                <p><strong>Lugar de Nacimiento: </strong> {{ $paciente[0]->lugarnac }} </p>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                <p><strong>Lugar de Procedencia: </strong> {{ $paciente[0]->lugarproc }} </p>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-12 form-group">
                                                <p><strong>Estado Civil: </strong> {{ $paciente[0]->estadocivil }} </p>
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                                                <p><strong>G. Intrucción: </strong> {{ $paciente[0]->instruccion }} </p>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-12 form-group">
                                                <p><strong>Ocupación: </strong> {{ $paciente[0]->ocupacion }} </p>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-12 form-group">
                                                <p><strong>Teléfono: </strong> {{ $paciente[0]->telefono }} </p>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                <p><strong>Dirección: </strong> {{ $paciente[0]->direccion }} </p>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                <p><strong>Correo: </strong> {{ $paciente[0]->correo }} </p>
                                            </div>
                                        </div>
                                      </div>
                                      <div class="col-xs-12 bottom text-center">
                                        <div class="col-xs-12 col-sm-6 emphasis">
                                          <p class="ratings">
                                            
                                          </p>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 emphasis">
                                          
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                                <div class="col-md-12 col-sm-12 col-xs-12 profile_details">
                                    <div class="well profile_view">
                                      <div class="col-sm-12">
                                        <h4 class="brief"><i>{{ $acompanate[0]->nombre }}</i></h4>
                                        <div class="left col-xs-12">
                                            <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                                                <p><strong>Parentezco: </strong> {{ $acompanate[0]->parentezco }} </p>
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                                                <p><strong>DNI: </strong> {{ $acompanate[0]->dni }} </p>
                                            </div>
                                            <div class="col-md-5 col-sm-5 col-xs-12 form-group">
                                                <p><strong>Telefono: </strong> {{ $acompanate[0]->telefono }} </p>
                                            </div>
                                        </div>
                                      </div>
                                      <div class="col-xs-12 bottom text-center">
                                        <div class="col-xs-12 col-sm-6 emphasis">
                                          <p class="ratings">
                                            
                                          </p>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 emphasis">
                                          
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                

                                  
                            </div>
                          </div>
                        </div>
    
                      </div>
                    </div>
                  </div>    
              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
              
            </div>

          </div>
        </div>
</div>

<div class="modal fade bs-mostrarExamen-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="mostrarExamen">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">{{ $datosPersonales[0]->nombre }}</h4>
        </div>
        <div class="modal-body">
          <div>
            <div id="mostrarDocumento">

            </div>

          </div>
                
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
          
        </div>

      </div>
    </div>
</div>

<div class="modal fade bs-detalleOrdenExamen-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="detalleOrdenExamen">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Detalles de la Orden de Exámen:</h4>
        </div>
        <div class="modal-body">
          <div>
            <div id="mostrarOrden">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nombre</th>
                      <th>Descripcion</th>
                      <th>Laboratorio</th>
                      <th>Administrar</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($resultados as $ro)
                      <tr>
                        <th scope="row">{{ $ro->id }}</th>
                        <td>{{ $ro->documento }}</td>
                        <td>{{ $ro->descripcion }}</td>
                        <td>{{ $ro->laboratorio }}</td>
                        <td>
                          <div class="btn-group">
                             <!-- <button type="button" class="btn btn-xs btn-default" onclick="eliminarObservacion()" data-placement="top" data-toggle="tooltip" data-original-title="Ver Archivo"><i class="fa fa-file-archive-o"></i></button> -->
                              <a type="button" href="{{ route('downloadOrdenExamen', " $ro->id " ) }}" class="btn btn-xs btn-primary" hr data-placement="top" data-toggle="tooltip" data-original-title="Descargar Archivo {{ $ro->id }}"><i class="fa fa-download"></i></a>
                              <button type="button" class="btn btn-xs btn-danger" onclick="eliminarObservacion()" data-placement="top" data-toggle="tooltip" data-original-title="Eliminar Archivo"><i class="fa fa-eraser"></i></button>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>

          </div>
                
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
          
        </div>

      </div>
    </div>
</div>

<div class="modal fade bs-detalleExamenAuxiliar-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="detalleExamenAuxiliar">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Resultados del Exámen Auxiliar:</h4>
        </div>
        <div class="modal-body">
          <div>
            <div id="tabResultAux">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nombre</th>
                      <th>Descripcion</th>
                      <th>Administrar</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($resultadoAux as $ra)
                      <tr>
                        <th scope="row">{{ $ra->id }}</th>
                        <td>{{ $ra->nombre }}</td>
                        <td>{{ $ra->detalle }}</td>
                        <td>
                          <div class="btn-group">
                             <!-- <button type="button" class="btn btn-xs btn-default" onclick="eliminarObservacion()" data-placement="top" data-toggle="tooltip" data-original-title="Ver Archivo"><i class="fa fa-file-archive-o"></i></button> -->
                              <a type="button" href="{{ route('downloadExamenAuxiliar', " $ra->id " ) }}" class="btn btn-xs btn-primary" hr data-placement="top" data-toggle="tooltip" data-original-title="Descargar Archivo {{ $ra->id }}"><i class="fa fa-download"></i></a>
                              <button type="button" class="btn btn-xs btn-danger" onclick="eliminarObservacion()" data-placement="top" data-toggle="tooltip" data-original-title="Eliminar Archivo"><i class="fa fa-eraser"></i></button>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>

          </div>
                
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
          
        </div>

      </div>
    </div>
</div>


<form id="fOrdenExamen" name="fOrdenExamen" method="post" action="subirOrdenExamen" class="formOrdenExamen" enctype="multipart/form-data">
  {{ csrf_token() }}
  
  <div class="modal fade bs-subirOrdenExamen-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="subirOrdenExamen">
      
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Orden De Exámen: {{ $datosPersonales[0]->nombre }}</h4>
            <input type="text" name="idOrden" id="idOrden" class="hidden">
            <input type="text" name="_token" id="_token" class="hidden" value="{{ csrf_token() }}">
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre de Documento <span class="required">*</span>
              </label>
                <input type="text" id="nomDocOrdExam" name="nomDocOrdExam" required="required" class="form-control">
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Descripción <span class="required">*</span>
              </label>
                <textarea class="form-control" rows="3" id="descOrdExam" name="descOrdExam"></textarea>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Laboratorio <span class="required">*</span>
              </label>
              <select class="form-control" id="idLabSelect" name="idLabSelect">
                <option>Seleccionar Laboratorio...</option>
                @foreach ($laboratorio as $lab)
                <option value="{{ $lab->id }}">{{ $lab->nombre }}</option>    
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Seleccione Documento <span class="required">*</span>
              </label>
                <input type="file" id="docOrdExam" name="docOrdExam" required="required" class="form-control">
            </div>
                  
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-default">Ok</button>
            
          </div>

        </div>
      </div>
  </div>
</form>

<form id="fExamenAuxiliar" name="fExamenAuxiliar" method="post" action="subirExamenAuxiliar" class="formExamenAuxiliar" enctype="multipart/form-data">
  {{ csrf_token() }}
  
  <div class="modal fade bs-subirOrdenExamen-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="subirExamenAuxiliar">
      
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Exámen Auxiliar: {{ $datosPersonales[0]->nombre }}</h4>
            <input type="text" name="idOrden" id="idOrden" class="hidden">
            <input type="text" name="_token" id="_token" class="hidden" value="{{ csrf_token() }}">
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre de Documento <span class="required">*</span>
              </label>
                <input type="text" id="nomDocOrdExam" name="nomDocOrdExam" required="required" class="form-control">
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Descripción <span class="required">*</span>
              </label>
                <textarea class="form-control" rows="3" id="descOrdExam" name="descOrdExam"></textarea>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Laboratorio <span class="required">*</span>
              </label>
              <select class="form-control" id="idLabSelect" name="idLabSelect">
                <option>Seleccionar Laboratorio...</option>
                @foreach ($laboratorio as $lab)
                <option value="{{ $lab->id }}">{{ $lab->nombre }}</option>    
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Seleccione Documento <span class="required">*</span>
              </label>
                <input type="file" id="docExamAux" name="docExamAux" required="required" class="form-control">
            </div>
                  
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-default">Ok</button>
            
          </div>

        </div>
      </div>
  </div>
</form>

@endsection

@section('script')


<script>
function CrearOrdenExamen(){
   var idExaExterno=[];
    $('.chekboxses:checked').each(
    function() {
      idExaExterno.push($(this).val());
      }
    );
    var consultas_id = $('#consultas_id').val();
    var laboratorio_id = $('#idLabSelect').val();
    var fechaOrden = $('#fechaOrden').val();
    var citas_id = $('#idCita').val();
    
    $.post( "{{ route('consultaorden.store') }}", {idExaExterno:idExaExterno, consultas_id: consultas_id, laboratorio_id: laboratorio_id, fechaOrden: fechaOrden, citas_id: citas_id, _token:'{{csrf_token()}}'}).done(function(data) {
          window.open(
                      "../../ticketOrdenExamen/"+data.citas_id+"",
                      "_blank" // <- This is what makes it open in a new window.
                    );
          $("#tabOrdenExam").empty();
          $("#tabOrdenExam").html(data.view);
                     
    });
  }

function Enter(e){
  tecla = (document.all) ? e.keyCode : e.which;
  if (tecla == 13){
    var codigo = $("#search").val();
    $.post('{{ route("buscarDiagnostico") }}', {codigo:codigo, _token:'{{ csrf_token()}}'}).done(function(data) {
      $("#inputSuccess2").val(data.diagnostico); 
      $("#idCies").val(data.idCies);

       if(data.resultado=='0')
       {
         alert("El código ingresado no pertenece a ningún diagnóstico")
       }
    });
  }
}

function guardarTratamiento(){
  var indicaciones = $('#indicaciones').val();
  var consultas_id = $('#consultas_id').val();
  var cantidad = $('#cantidad').val();
  var dosis = $('#dosis').val();
  var via = $('#via').val();
  var frecuencia = $('#frecuencia').val();
  var duracion = $('#duracion').val();
  var medicamentos_id = $('#medicamentos_id').val();
  //alert(medicamentos_id)
  $.post('{{ route("tratamiento.store") }}', {cantidad:cantidad, dosis:dosis, via:via, frecuencia:frecuencia, duracion:duracion, indicaciones: indicaciones, consultas_id: consultas_id, medicamentos_id: medicamentos_id, _token: '{{ csrf_token() }}'}).done(function(data){
    //alert(data.resultado);
    $("#indicaciones").val(null);
    $("#cantidad").val(null);
    $("#dosis").val(null);
    $("#via").val(null);
    $("#frecuencia").val(null);
    $("#duracion").val(null);
    $("#medicamentos_id").val('Seleccionar Medicamento');
    $("#tablaTratamiento").empty();
    $("#tablaTratamiento").html(data.view);

  });
}

function mostrarOrden(){
  var lab = $('#ordLab').val();
  //alert(indicaciones)
  var esp = $('#ordTEx').val();
  $("#lab").val(lab);
  $("#esp").val(esp);
  
}

function detalleOrden(){
  $('#detalleOrdenExamen').modal('show');
}

function detalleExaAux(){
  $('#detalleExamenAuxiliar').modal('show');
}

function subirOrden(id){
  $('#subirOrdenExamen').modal('show');
  $("#idOrden").val(id);
}

function subirExaAux(id){
  $('#SubirExaAux').modal('show');
  $("#idOrden").val(id);
}

function guardarObservacion(){
  var nombre = $('#nombreObservacion').val();
  
  var consultas_id = $('#consultas_id').val();
  //alert(nombre + consultas_id)
  $.post('{{ route("observacion.store") }}', {nombre: nombre, consultas_id: consultas_id, _token: '{{ csrf_token() }}'}).done(function(data){
   //alert(data.resultado);
   $("#nombreObservacion").val(null);
   $("#divObservacion").empty();
  $("#divObservacion").html(data.view);
  });
}

function diagnostico(){
  var codigo=$("#search").val();
  var consulta = $('#consultas_id').val();
  var idCies=$("#search").val();
  //alert(idCies)
    $.post( '{{ route("diagnosticoCies") }}', {codigo:codigo, consulta: consulta, idCies: idCies, _token:'{{csrf_token()}}'}).done(function(data) {
      
      $("#search").val(null);
      $("#inputSuccess2").val(null);
      $("#divDiagnostico").empty();
      $("#divDiagnostico").html(data.view);
     // alert(data.resultado)
      
    });
}

function guardarOrdenExamen(){
  var descripcion = $('#descripcionOrden').val();
  var fecha = $('#fechaOrdens').val();
  var laboratorios_id = $('#laboratorio').val();
  var medico = $('#medico').val();
  var idconsultas = $('#consultas_id').val();
  var idtipoexamen = $('#idtipoexamen').val();
  alert("Hola")
  $.post("/orden/store", {descripcion: descripcion, fecha: fecha, laboratorios_id: laboratorios_id, medico: medico, idconsultas: idconsultas, idtipoexamen: idtipoexamen, _token: '{{ csrf_token() }}'}).done(function(data){
    //alert(data.resultado);
    //alert(data.idorden);
    //var idorden = data.idorden; 
    window.location="{{ route('ticketOrdenExamen',["+data.idorden+"]) }}";
  });
}

function enviarExaAux(){
  
  var idExaAuxiliar=[];
  $('.checkbox:checked').each(
  function() {
    idExaAuxiliar.push($(this).val());
    }
  );
  var citas_id = $('#idCita').val();
  
  $.post('{{ route("examenginecologico.store") }}', {idExaAuxiliar: idExaAuxiliar, citas_id: citas_id, _token: '{{ csrf_token() }}'}).done(function(data){
    $("#divexamGine").empty();
    $("#divexamGine").html(data.view);
  });
}

function eliminarDiagnostico(idDia){ 
  var consultas_id = $('#consultas_id').val();
  
  
  $.post('{{ route("diagnostico.delete") }}', {idDia: idDia, consultas_id: consultas_id, _token: '{{ csrf_token() }}'}).done(function(data){
    $("#divDiagnostico").empty();
    $("#divDiagnostico").html(data.view);
  });
}

function eliminarTratamiento(idTra){ 
  var consultas_id = $('#consultas_id').val();
  
  
  $.post('{{ route("tratamiento.delete") }}', {idTra: idTra, consultas_id: consultas_id, _token: '{{ csrf_token() }}'}).done(function(data){
    $("#tablaTratamiento").empty();
    $("#tablaTratamiento").html(data.view);
  });
}

function eliminarObservacion(idObs){ 
  var consultas_id = $('#consultas_id').val();
  
  
  $.post('{{ route("observacion.delete") }}', {idObs: idObs, consultas_id: consultas_id, _token: '{{ csrf_token() }}'}).done(function(data){
    $("#divObservacion").empty();
    $("#divObservacion").html(data.view);
  });
}

function mantenerConsulta(){
  var idCita = $('#idCita').val();
  var motivo = $('#motivo').val();
  var tiempo = $('#tiempo').val();
  var ap = $('#ap').val();
  var sed = $('#sed').val();
  var sueño = $('#sueño').val();
  var orina = $('#orina').val();
  var deposicion = $('#deposicion').val();
  var cabeza = $('#cabeza').val();
  var cuello = $('#cuello').val();
  var torax = $('#torax').val();
  var mamas = $('#mamas').val();
  var pulmoncardio = $('#pulmoncardio').val();
  var abdomen = $('#abdomen').val();
  var gebus = $('#geybus').val();
  var cervix = $('#cervix').val();
  var ovarios = $('#ovarios').val();
  var vagina = $('#vagina').val();
  var utero = $('#utero').val();
  var fondosaco = $('#fondosaco').val();
  var estadoConsulta = "CONSULTA";
  //var examenginecologicos_id = $('#examenginecologicos_id').val();
  //alert(examenginecologicos_id)
  
  $.post('{{ route("consulta.mantener") }}', {estadoConsulta: estadoConsulta, idCita: idCita, motivo: motivo, tiempo: tiempo, ap: ap, sed: sed, sueño: sueño,orina: orina, deposicion: deposicion, cabeza: cabeza, cuello: cuello, torax: torax, mamas: mamas, pulmoncardio: pulmoncardio, abdomen: abdomen, gebus: gebus, cervix: cervix, ovarios: ovarios, vagina: vagina, utero: utero, fondosaco: fondosaco, _token: '{{ csrf_token() }}'}).done(function(data){
    

  });
  
}


function finalizarConsulta(){
  var idCita = $('#idCita').val();
  var motivo = $('#motivo').val();
  var tiempo = $('#tiempo').val();
  var ap = $('#ap').val();
  var sed = $('#sed').val();
  var sueño = $('#sueño').val();
  var orina = $('#orina').val();
  var deposicion = $('#deposicion').val();
  var cabeza = $('#cabeza').val();
  var cuello = $('#cuello').val();
  var torax = $('#torax').val();
  var mamas = $('#mamas').val();
  var pulmoncardio = $('#pulmoncardio').val();
  var abdomen = $('#abdomen').val();
  var gebus = $('#geybus').val();
  var cervix = $('#cervix').val();
  var ovarios = $('#ovarios').val();
  var vagina = $('#vagina').val();
  var utero = $('#utero').val();
  var fondosaco = $('#fondosaco').val();
  //var examenginecologicos_id = $('#examenginecologicos_id').val();
  //alert(examenginecologicos_id)
  
  $.post('{{ route("consulta.store") }}', {idCita: idCita, motivo: motivo, tiempo: tiempo, ap: ap, sed: sed, sueño: sueño,orina: orina, deposicion: deposicion, cabeza: cabeza, cuello: cuello, torax: torax, mamas: mamas, pulmoncardio: pulmoncardio, abdomen: abdomen, gebus: gebus, cervix: cervix, ovarios: ovarios, vagina: vagina, utero: utero, fondosaco: fondosaco, _token: '{{ csrf_token() }}'}).done(function(data){
    //alert(data.resultado);
    window.location="{{ route('home') }}";

  });
  
}


$(document).ready(function(){
  $('#inputSuccess2').keyup(function(){
    var query = $(this).val();
    //alert(query);
    if (query != '') {
      var _token = $('input[name="_token"]').val();
      $.ajax({
        url:"{{ route('consultas.diagdetcie') }}",
        type: "POST",
        data:{query: query, _token: _token},
        success:function(data){
          $('#diagnosticolist').fadeIn();
          $('#diagnosticolist').html(data);
        }
      })
    }
  });
});

$(document).on('click', 'li', function(){
  $('#inputSuccess2').val($(this).text());
  $('#diagnosticolist').fadeOut();
  var codigo = $("#inputSuccess2").val();
  //alert(codigo);
    $.post('{{ route("buscarDiagDetCie") }}', {codigo:codigo, _token:'{{ csrf_token()}}'}).done(function(data) {
      $("#search").val(data.codigoCIE); //Asigna valor a input "inputSuccess2"
      //$("#idCies").val(data.idCies);
     // alert(data.codigo);

       if(data.resultado=='0')
       {
         alert("El código ingresado no pertenece a ningún diagnóstico") 
       }
    });
});

function validarExt(){
  var  archivoInput = document.getElementById('InputArchivo');
  var archivoRuta = archivoInput.value;
  var extPermitidas = /(.pdf|.png|.jpeg|.jpg|.doc|.xls|.txt|.docx|.ppt)$/i;
  if (!extPermitidas.exec(archivoRuta)) {
    alert('Archivo Incorrecto');
    archivoInput.value='';
    return false
  }else{
    
    //$('#mostrarExamen').modal('show');
    if (archivoInput.files && archivoInput.files[0]) {
     
      var visor = new FileReader();
      visor.onload=function(e){
       // alert(archivoInput);
        document.getElementById('mostrarDocumento').innerHTML='<embed scr="'+e.target.result+'" width="500" height="500">';
      };
      visor.readAsDataURL(archivoInput.files[0]);
    }
  }
  
}

function mostrarExamExterno(id){

  $.post('{{ route("consulta.examexterno") }}', {id: id, _token: '{{ csrf_token() }}'}).done(function(data){
    $("#divCheckExamen").empty();
    $("#divCheckExamen").html(data.view);
  });
  
}

$(document).on("submit",".formOrdenExamen",function(e){

  e.preventDefault();
  var formu = $(this);
  var nombreform = $(this).attr("id");
  if (nombreform == "fOrdenExamen") {
    var miurl = "{{ Route('subirOrdenExamen') }}";
    var divresul = "notificacion_resul_fci";
  }
  var formData = new FormData($("#"+nombreform+"")[0]);
  $.ajax({ url: miurl, type: 'POST', data: formData, cache: false, contentType: false, processData: false,
           beforeSend: function(){
             alert("Realizando Peticion");
             $("#"+divresul+"").html($("#cargador_empresa").html());
           },
           success: function(data){
            $('#subirOrdenExamen').modal('hide');
             $("#"+divresul+"").html(data);
             $("#tabOrdenExam").empty();
             $("#tabOrdenExam").html(data.view);
           },
           error: function(data) {
             alert("Ha ocurrido un error");
           }  
  });
});

/* Aqui enviamos los datos del examen auxiliar*/

$(document).on("submit",".formExamAuxiliar",function(e){
  e.preventDefault();
  var formu = $(this);
  var nombreform = $(this).attr("id");
  if (nombreform == "fExamAuxiliar") {
    var miurl = "{{ Route('subirExamenAuxiliarMotConsul') }}";
    var divresul = "notificacion_resul_fci";
  }
  var formData = new FormData($("#"+nombreform+"")[0]);
  $.ajax({ url: miurl, type: 'POST', data: formData, cache: false, contentType: false, processData: false,
           beforeSend: function(){
             alert("Realizando Peticion");
             $("#"+divresul+"").html($("#cargador_empresa").html());
           },
           success: function(data){
             alert('Todo bien');
            $('#SubirExaAux').modal('hide');
             $("#"+divresul+"").html(data);
             /*$("#tabOrdenExam").empty();
             $("#tabOrdenExam").html(data.view);*/
           },
           error: function(data) {
             alert("Ha ocurrido un error");
           }  
  });
});







$(document).on("submit",".formExamenAuxiliar",function(e){
  e.preventDefault();
  var formu = $(this);
  var nombreform = $(this).attr("id");
  if (nombreform == "fExamenAuxiliar") {
    var miurl = "{{ Route('subirExamenAuxiliar') }}";
    var divresul = "notificacion_resul_fci";
  }
  var formData = new FormData($("#"+nombreform+"")[0]);
  $.ajax({ url: miurl, type: 'POST', data: formData, cache: false, contentType: false, processData: false,
           beforeSend: function(){
             alert("Realizando Peticion");
             $("#"+divresul+"").html($("#cargador_empresa").html());
           },
           success: function(data){
            $('#subirExamenAuxiliar').modal('hide');
             $("#"+divresul+"").html(data);
             $("#tabResultAux").empty();
             $("#tabResultAux").html(data.view);
           },
           error: function(data) {
             alert("Ha ocurrido un error");
           }  
  });
});

</script>
@endsection

