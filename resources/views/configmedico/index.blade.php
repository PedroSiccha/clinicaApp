@extends('layouts.base')
@section('title')
 Configuraciones Médica 
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
          </div>
        </div>
      </div>

      <div class="clearfix"></div>

      <div class="row">

          <!-- Tabla para la configuracion de las ALERGIAS -->
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Alérgias <small><button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target=".bs-alergia-modal-lg"><i class="fa fa-plus"></i></button></small></h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content" id="divAlergiaTab">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Código</th>
                      <th>Alérgia</th>
                      <th>Administrar</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($alergia as $ale)
                      <tr>
                            <th>{{ $ale->id }}</th>
                            <td>{{ $ale->nombre }}</td>
                            <td>
                                    <div class="btn-group">
                                            <button class="btn btn-primary btn-xs" onclick="cargarAlergia('{{$ale->id}}','{{$ale->nombre}}')"><i class="fa fa-pencil"></i></button>
                                            <button class="btn btn-danger btn-xs" onclick="eliminarAlergia('{{$ale->id}}')"><i class="fa fa-eraser"></i></button>         
                                    </div>
                            </td>
                          </tr>
                          
                          
                          
                      @endforeach
                  </tbody>
                </table>
  
              </div>
            </div>
          </div>
          <!-- Fin Tabla para la configuracion de las ALERGIAS -->

          <!-- Tabla para la configuracion de los MÉTODOS ANTICONCEPTIVOS-->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Método Anticonceptivo <small><button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target=".bs-metanti-modal-lg" ><i class="fa fa-plus"></i></button></small></h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content" id="divMetodoAnticonceptivoTab">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Código</th>
                      <th>Método</th>
                      <th>Administrar</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($metodoanticonceptivo as $ma)
                      <tr>
                            <th>{{ $ma->id }}</th>
                            <td>{{ $ma->nombre }}</td>
                            <td>
                                    <div class="btn-group">
                                            <button class="btn btn-primary btn-xs" onclick="cargarMetodoAnticonceptivo('{{$ma->id}}','{{$ma->nombre}}')"><i class="fa fa-pencil"></i></button>
                                            <button class="btn btn-danger btn-xs" onclick="eliminarMetodoAnticonceptivo('{{$ma->id}}')"><i class="fa fa-eraser"></i></button>         
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

        <!-- Tabla para la configuracion de los estados de SED -->
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Estado de SED <small><button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target=".bs-sed-modal-lg"><i class="fa fa-plus"></i></button></small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content" id="divSedTab">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Código</th>
                    <th>Estado</th>
                    <th>Administrar</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($sed as $sed)
                    <tr>
                            <th scope="row">{{ $sed->id }}</th>
                            <td>{{ $sed->nombre }}</td>
                            <td>
                                    <div class="btn-group">
                                            <button class="btn btn-primary btn-xs" onclick="cargarSed('{{ $sed->id }}','{{ $sed->nombre }}')"><i class="fa fa-pencil"></i></button>
                                            <button class="btn btn-danger btn-xs" onclick="eliminarSed('{{$sed->id}}')"><i class="fa fa-eraser"></i></button>         
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


        <!-- Tabla para la configuracion de los ESTADOS DE APETITOS -->
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Estados del Apetito <small><button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target=".bs-apetito-modal-lg"><i class="fa fa-plus"></i></button></small></h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content" id="divApetitoTab">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Código</th>
                      <th>Estado</th>
                      <th>Administrar</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($apetito as $ape)
                      <tr>
                            <th scope="row">{{ $ape->id }}</th>
                            <td>{{ $ape->nombre }}</td>
                            <td>
                                    <div class="btn-group">
                                            <button class="btn btn-primary btn-xs" onclick="cargarApetito('{{ $ape->id }}','{{ $ape->nombre }}')"><i class="fa fa-pencil"></i></button>
                                            <button class="btn btn-danger btn-xs" onclick="eliminarApetito('{{$ape->id}}')"><i class="fa fa-eraser"></i></button>         
                                    </div>
                            </td>
                      </tr>      
                      @endforeach
                  </tbody>
                </table>
  
              </div>
            </div>
          </div>

          <!-- Tabla para la configuracion de los ESTADOS DE DEPOSICIONES -->
        <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Estados de Deposiciones <small><button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target=".bs-deposicion-modal-lg"><i class="fa fa-plus"></i></button></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content" id="divDeposicionTab">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Código</th>
                          <th>Nombre</th>
                          <th>Administrar</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($deposicion as $dep)
                          <tr>
                                <th scope="row">{{ $dep->id }}</th>
                                <td>{{ $dep->nombre }}</td>
                                <td>
                                        <div class="btn-group">
                                                <button class="btn btn-primary btn-xs" onclick="cargarDeposicion('{{ $dep->id }}','{{ $dep->nombre }}')"><i class="fa fa-pencil"></i></button>
                                                <button class="btn btn-danger btn-xs" onclick="eliminarDeposicion('{{$dep->id}}')"><i class="fa fa-eraser"></i></button>         
                                        </div>
                                </td>
                          </tr>      
                          @endforeach
                      </tbody>
                    </table>
      
                  </div>
                </div>
              </div>

              
      <!-- Tabla para la configuracion de los ESTADOS DE ORINA -->
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Estados de la Orina <small><button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target=".bs-orina-modal-lg"><i class="fa fa-plus"></i></button></small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content" id="divOrinaTab">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Código</th>
                  <th>Estado</th>
                  <th>Administrar</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($orina as $ori)
                  <tr>
                        <th scope="row">{{ $ori->id }}</th>
                        <td>{{ $ori->nombre }}</td>
                        <td>
                                <div class="btn-group">
                                        <button class="btn btn-primary btn-xs" onclick="cargarOrina('{{ $ori->id }}','{{ $ori->nombre }}')"><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-danger btn-xs" onclick="eliminarOrina('{{$ori->id}}')"><i class="fa fa-eraser"></i></button>         
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

  <!-- Tabla para la configuracion de los ESTADOS DE SUEÑO -->
  <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Estados del Sueño <small><button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target=".bs-sueño-modal-lg"><i class="fa fa-plus"></i></button></small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content" id="divSuenioTab">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Código</th>
                  <th>Estado</th>
                  <th>Administrar</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($sueño as $sue)
                  <tr>
                        <th scope="row">{{ $sue->id }}</th>
                        <td>{{ $sue->nombre }}</td>
                        <td>
                                <div class="btn-group">
                                        <button class="btn btn-primary btn-xs" onclick="cargarSuenio('{{ $sue->id }}','{{ $sue->nombre }}')"><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-danger btn-xs" onclick="eliminarSuenio('{{$sue->id}}')"><i class="fa fa-eraser"></i></button>         
                                </div>
                        </td>
                  </tr>      
                  @endforeach
              </tbody>
            </table>

          </div>
        </div>
      </div>

      <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Laboratorios Sugeridos <small><button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target=".bs-lab-modal-lg"><i class="fa fa-plus"></i></button></small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content" id="divLaboratorioTab">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>RUC</th>
                    <th>Telefono</th>
                    <th>Direccion</th>
                    <th>Administrar</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($laboratorio as $lab)
                    <tr>
                          <th scope="row">{{ $lab->id }}</th>
                          <td>{{ $lab->nombre }}</td>
                          <td>{{ $lab->ruc }}</td>
                          <td>{{ $lab->telefono }}</td>
                          <td>{{ $lab->direccion }}</td>
                          <td>
                                  <div class="btn-group">
                                          <button class="btn btn-primary btn-xs" onclick="cargarLaboratorio('{{ $lab->id }}','{{ $lab->nombre }}','{{ $lab->ruc }}','{{ $lab->telefono }}','{{ $lab->direccion }}', '{{ $lab->correo }}')"><i class="fa fa-pencil"></i></button>
                                          <button class="btn btn-danger btn-xs" onclick="eliminarLaboratorio('{{$lab->id}}')"><i class="fa fa-eraser"></i></button>         
                                  </div>
                          </td>
                    </tr>      
                    @endforeach
                </tbody>
              </table>
  
            </div>
          </div>
        </div>

        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Lista de Medicamentos <small><button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target=".bs-medicamentos-modal-lg"><i class="fa fa-plus"></i></button></small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content" id="divMedicamentoTab">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Concentración</th>
                    <th>Presentación</th>
                    <th>Administrar</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($medicamentos as $med)
                    <tr>
                          <th scope="row">{{ $med->id }}</th>
                          <td>{{ $med->nombre }}</td>
                          <td>{{ $med->concentracion }}</td>
                          <td>{{ $med->presentacion }}</td>
                          <td>
                                  <div class="btn-group">
                                          <button class="btn btn-primary btn-xs" onclick="cargarMedicamento('{{ $med->id }}','{{ $med->nombre }}','{{ $med->concentracion }}','{{ $med->presentacion }}')"><i class="fa fa-pencil"></i></button>
                                          <button class="btn btn-danger btn-xs" onclick="eliminarMedicamento('{{$med->id}}')"><i class="fa fa-eraser"></i></button>         
                                  </div>
                          </td>
                    </tr>      
                    @endforeach
                </tbody>
              </table>
  
            </div>
          </div>
        </div>

        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Lista de CIES <small><button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target=".bs-cies-modal-lg"><i class="fa fa-plus"></i></button></small></h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content" id="divCieTab">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Código</th>
                      <th>Descripcion</th>
                      <th>Tipo</th>
                      <th>Administrar</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($cie as $c)
                      <tr>
                            <th scope="row">{{ $c->codigo }}</th>
                            <td>{{ $c->descripcion }}</td>
                            <td>{{ $c->tipo }}</td>
                            <td>
                                    <div class="btn-group">
                                            <button class="btn btn-primary btn-xs" onclick="cargarCie('{{ $c->id }}','{{ $c->codigo }}','{{ $c->descripcion }}','{{ $c->tipo }}')"><i class="fa fa-pencil"></i></button>
                                            <button class="btn btn-danger btn-xs" onclick="eliminarCie('{{$c->id}}')"><i class="fa fa-eraser"></i></button>         
                                    </div>
                            </td>
                      </tr>      
                      @endforeach
                  </tbody>
                </table>
    
              </div>
            </div>
          </div>

  <!-- MODALES -->
  <!-- MODAL CREAR ALERGIA -->
  <div class="modal fade bs-alergia-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="mCrearAlergia">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Nuevo Alergia</h4>
            </div>
            <div class="modal-body">
              <h4>Registrar Alergia:</h4>
              <p>
                  <div class="control-form">
                    <input type="text" class="form-control" placeholder="Ingrese aquí la alergia nueva" name='nombre' id="cNombreAlergia">
                  </div>
               </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-primary" onclick="crearAlergia()" data-dismiss="modal">Guardar</button>
            </div>
          </div>
        </div>
  </div>
 
  

  <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="mEditarAlergia">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Nuevo Alergia</h4>
          </div>
          <div class="modal-body">
            <h4>Registrar Alergia:</h4>
            <p>
                <div class="control-form">
                    <input type="text" class="form-control" placeholder="Ingrese aquí la alergia nueva" name='nombre' id="eNombreAlergia">
                    <input type="text" class="form-control hidden" placeholder="Ingrese aquí la alergia nueva" name='id' id="eIdAlergia">
                </div>
              </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary" onclick="editarAlergia()" data-dismiss="modal">Guardar</button>
          </div>
        </div>
      </div>
  </div>

    <!-- Modal Gestion CIES -->

    <div class="modal fade bs-cies-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="mCrearCie">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Nuevo CIE</h4>
            </div>
            <div class="modal-body">
              <h4>Registrar Código:</h4>
              <p>
                  <div class="control-form">
                    <input type="text" class="form-control" placeholder="Ingrese Código Internacional de Enfermedades" name='nombre' id="cCodCie">
                  </div>
               </p>
               <h4>Registrar Descripción:</h4>
              <p>
                  <div class="control-form">
                    <input type="text" class="form-control" placeholder="Ingrese aquí la Descripcion o Nombre" name='nombre' id="cNomCie">
                  </div>
               </p>
               <h4>Elegir Tipo:</h4>
              <p>
                  <div class="control-form">
                    <select class="form-control" id="cTipoCie">
                        <option>Seleccionar Tipo de CIE</option>
                        @foreach ($tipocie as $tc)
                          <option value="{{ $tc->id }}">{{$tc->nombre}}</option>    
                        @endforeach
                      </select>
                  </div>
               </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-primary" onclick="crearCie()" data-dismiss="modal">Guardar</button>
            </div>
          </div>
        </div>
  </div>

  <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="mEditarCie">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Editar CIE</h4>
          </div>
          <div class="modal-body">
            <h4>Código:</h4>
            <p>
                <div class="control-form">
                    <input type="text" class="form-control" id="eCodCie">
                    <input type="text" class="form-control hidden" name='id' id="eIdCie">
                </div>
            </p>
            <h4>Descripcion:</h4>
            <p>
                <div class="control-form">
                    <input type="text" class="form-control" name='nombre' id="eDescCie">
                </div>
            </p>
            <h4>Tipo:</h4>
            <p>
                <div class="control-form">
                    <select class="form-control" id="eTipoCie">
                        <option>Seleccionar Tipo de CIE</option>
                        @foreach ($tipocie as $tc)
                          <option value="{{ $tc->id }}">{{$tc->nombre}}</option>    
                        @endforeach
                      </select>
                  </div>
            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary" onclick="editarCie()" data-dismiss="modal">Guardar</button>
          </div>
        </div>
      </div>
  </div>


  <!-- MODAL CREAR LABORATORIO -->
  <div class="modal fade bs-lab-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="mCrearLaboratorio">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Nuevo Laboratorio</h4>
          </div>
          <div class="modal-body">
              <h4>Nombre:</h4>
              <p>
                  <div class="control-form">
                    <input type="text" class="form-control" placeholder="Ingrese aquí el nombre" name='nombre' id="cNomLab">
                  </div>
               </p>
            </div>
            <div class="modal-body">
                <h4>RUC:</h4>
                <p>
                    <div class="control-form">
                      <input type="text" class="form-control" placeholder="Ingrese aquí el RUC" name='ruc' id="cRucLab">
                    </div>
                 </p>
              </div>
              <div class="modal-body">
                  <h4>Direccion:</h4>
                  <p>
                      <div class="control-form">
                        <input type="text" class="form-control" placeholder="Ingrese aquí la direccion" name='direccion' id="cDirLab">
                      </div>
                   </p>
                </div>
                <div class="modal-body">
                    <h4>Teléfono:</h4>
                    <p>
                        <div class="control-form">
                          <input type="text" class="form-control" placeholder="Ingrese aquí el teléfono" name='telefono' id="cTelLab">
                        </div>
                     </p>
                  </div>
                  <div class="modal-body">
                      <h4>Correo:</h4>
                      <p>
                          <div class="control-form">
                            <input type="text" class="form-control" placeholder="Ingrese aquí el correo" name='correo' id="cCorLab">
                          </div>
                       </p>
                    </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="editarLaboratorio()">Guardar</button>
          </div>
        </div>
      </div>
</div>
<div class="modal fade bs-lab-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="mEditarLab">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Nuevo Laboratorio</h4>
        </div>
        <div class="modal-body">
            <h4>Nombre:</h4>
            <p>
                <div class="control-form">
                  <input type="text" class="form-control" placeholder="Ingrese aquí el nombre" name='nombre' id="eNomLab">
                  <input type="text" class="form-control hidden" placeholder="Ingrese aquí el nombre" name='nombre' id="eIdLab">
                </div>
             </p>
          </div>
          <div class="modal-body">
              <h4>RUC:</h4>
              <p>
                  <div class="control-form">
                    <input type="text" class="form-control" placeholder="Ingrese aquí el RUC" name='ruc' id="eRucLab">
                  </div>
               </p>
            </div>
            <div class="modal-body">
                <h4>Direccion:</h4>
                <p>
                    <div class="control-form">
                      <input type="text" class="form-control" placeholder="Ingrese aquí la direccion" name='direccion' id="eDirLab">
                    </div>
                 </p>
              </div>
              <div class="modal-body">
                  <h4>Teléfono:</h4>
                  <p>
                      <div class="control-form">
                        <input type="text" class="form-control" placeholder="Ingrese aquí el teléfono" name='telefono' id="eTelLab">
                      </div>
                   </p>
                </div>
                <div class="modal-body">
                    <h4>Correo:</h4>
                    <p>
                        <div class="control-form">
                          <input type="text" class="form-control" placeholder="Ingrese aquí el correo" name='correo' id="eCorLab">
                        </div>
                     </p>
                  </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="editarLaboratorio()">Guardar</button>
        </div>
      </div>
    </div>
</div>

  <!-- MODAL CREAR METODO ANTICONCEPTIVO -->
  <div class="modal fade bs-metanti-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="mCrearMetAnticonceptivo">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Nuevo Método Anticonceptivo</h4>
            </div>
            <div class="modal-body">
              <h4>Registrar Método:</h4>
              <p>
                  <div class="control-form">
                    <input type="text" class="form-control" placeholder="Ingrese aquí el nuevo método anticonceptivo" name="nombre" id="cNomMetAnticonceptivo">
                  </div>
               </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary" onclick="crearMetodoAnticonceptivo()" data-dismiss="modal">Guardar</button>
            </div>
          </div>
        </div>
  </div>
  <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="mEditarMetAnticonceptivo">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Nuevo Método Anticonceptivo</h4>
          </div>
          <div class="modal-body">
            <h4>Registrar Método:</h4>
            <p>
                <div class="control-form">
                  <input type="text" class="form-control" placeholder="Ingrese aquí el nuevo método anticonceptivo" name="nombre" id="eNomMetAnticonceptivo">
                  <input type="text" class="form-control hidden" placeholder="Ingrese aquí el nuevo método anticonceptivo" name="nombre" id="eIdMetAnticonceptivo">
                </div>
             </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary" onclick="editarMetodoAnticonceptivo()" data-dismiss="modal">Guardar</button>
          </div>
        </div>
      </div>
</div>

  <!-- MODAL CREAR SED -->
  <div class="modal fade bs-sed-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="mCrearSed">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Nuevo estado de sed</h4>
            </div>
            <div class="modal-body">
              <h4>Registrar estado:</h4>
              <p>
                  <div class="control-form">
                    <input type="text" class="form-control" placeholder="Ingrese aquí el nuevo estado" name="nombre" id="cNomSed">
                  </div>
               </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary" data-dismiss="modal" onclick="crearSed()">Guardar</button>
            </div>
          </div>
        </div>
  </div>
  <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="mEditarSed">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Nuevo estado de sed</h4>
          </div>
          <div class="modal-body">
            <h4>Registrar estado:</h4>
            <p>
                <div class="control-form">
                  <input type="text" class="form-control" placeholder="Ingrese aquí el nuevo estado" name="nombre" id="eNomSed">
                  <input type="text" class="form-control hidden" placeholder="Ingrese aquí el nuevo estado" name="nombre" id="eIdSed">
                </div>
             </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary" data-dismiss="modal" onclick="editarSed()">Guardar</button>
          </div>
        </div>
      </div>
</div>

  <!-- MODAL CREAR APETITO -->
  <div class="modal fade bs-apetito-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="mCrearApetito">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Nuevo estado de apetito</h4>
            </div>
            <div class="modal-body">
              <h4>Registrar Estado:</h4>
              <p>
                  <div class="control-form">
                    <input type="text" class="form-control" placeholder="Ingrese aquí el nuevo estado" name="nombre" id="cNomApetito">
                  </div>
               </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary" data-dismiss="modal" onclick="crearApetito()">Guardar</button>
            </div>

    </div>
        </div>
  </div>
  <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="mEditarApetito">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Nuevo estado de apetito</h4>
          </div>
          <div class="modal-body">
            <h4>Registrar Estado:</h4>
            <p>
                <div class="control-form">
                  <input type="text" class="form-control" placeholder="Ingrese aquí el nuevo estado" name="nombre" id="eNomApetito">
                  <input type="text" class="form-control hidden" placeholder="Ingrese aquí el nuevo estado" name="nombre" id="eIdApetito">
                </div>
             </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary" data-dismiss="modal" onclick="editarApetito()">Guardar</button>
          </div>

  </div>
      </div>
</div>

  <!-- MODAL CREAR ESTADO DEPOSICIONES -->
  <div class="modal fade bs-deposicion-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="mCrearDeposicion">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Nuevo estado de deposición</h4>
            </div>
            <div class="modal-body">
              <h4>Registrar Estado:</h4>
              <p>
                  <div class="control-form">
                    <input type="text" class="form-control" placeholder="Ingrese aquí el nuevo estado" name="nombre" id="cNomDeposicion">
                  </div>
               </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary" data-dismiss="modal" onclick="crearDeposicion()">Guardar</button>
            </div>

          </div>
        </div>
  </div>
  <div class="modal fade bs-deposicion-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="mEditarDeposicion">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Nuevo estado de deposición</h4>
          </div>
          <div class="modal-body">
            <h4>Registrar Estado:</h4>
            <p>
                <div class="control-form">
                  <input type="text" class="form-control" placeholder="Ingrese aquí el nuevo estado" name="nombre" id="eNomDeposicion">
                  <input type="text" class="form-control hidden" placeholder="Ingrese aquí el nuevo estado" name="nombre" id="eIdDeposicion">
                </div>
             </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary" data-dismiss="modal" onclick="editarDeposicion()">Guardar</button>
          </div>

        </div>
      </div>
</div>

  <!-- MODAL CREAR SUEÑO -->
  <div class="modal fade bs-sueño-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="mCrearSueño">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Nuevo estado de sueño</h4>
            </div>
            <div class="modal-body">
              <h4>Registrar Estado:</h4>
              <p>
                  <div class="control-form">
                    <input type="text" class="form-control" placeholder="Ingrese aquí el nuevo estado" name="nombre" id="cNomSuenio">
                  </div>
               </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary" data-dismiss="modal" onclick="crearSuenio()">Guardar</button>
            </div>

          </div>
        </div>
  </div>
  <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="mEditarSuenio">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Nuevo estado de sueño</h4>
          </div>
          <div class="modal-body">
            <h4>Registrar Estado:</h4>
            <p>
                <div class="control-form">
                  <input type="text" class="form-control" placeholder="Ingrese aquí el nuevo estado" name="nombre" id="eNomSuenio">
                  <input type="text" class="form-control hidden" placeholder="Ingrese aquí el nuevo estado" name="nombre" id="eIdSuenio">
                </div>
             </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary" data-dismiss="modal" onclick="editarSuenio()">Guardar</button>
          </div>

        </div>
      </div>
</div>

  <!-- MODAL CREAR ESTADO DE ORINA -->
  <div class="modal fade bs-orina-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="mCrearOrina">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Nuevo estado de orina</h4>
            </div>
            <div class="modal-body">
              <h4>Registrar Estado:</h4>
              <p>
                  <div class="control-form">
                    <input type="text" class="form-control" placeholder="Ingrese aquí el nuevo estado" name="nombre" id="cNomOrina">
                  </div>
               </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary" data-dismiss="modal" onclick="crearOrina()">Guardar</button>
            </div>

          </div>
        </div>
  </div>
  <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="mEditarOrina">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Nuevo estado de orina</h4>
          </div>
          <div class="modal-body">
            <h4>Registrar Estado:</h4>
            <p>
                <div class="control-form">
                  <input type="text" class="form-control" placeholder="Ingrese aquí el nuevo estado" name="nombre" id="eNomOrina">
                  <input type="text" class="form-control hidden" placeholder="Ingrese aquí el nuevo estado" name="nombre" id="eIdOrina">
                </div>
             </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary" data-dismiss="modal" onclick="editarOrina()">Guardar</button>
          </div>

        </div>
      </div>
</div>

  <!-- MODAL CREAR MEDICAMENTO -->
  <div class="modal fade bs-medicamentos-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="mCrearMedicamento">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Nuevo Medicamento</h4>
          </div>
          <div class="modal-body">
            <h4>Medicamento:</h4>
            <p>
              <div class="control-form">
                <input type="text" class="form-control" placeholder="Ingrese aquí el nombre del medicamento" name="nomMed" id="cNomMedicamento">
              </div>
            </p>
            <h4>Concentración:</h4>
            <p>
              <div class="control-form">
                <input type="text" class="form-control" placeholder="Ingrese aquí la concentración del medicamento" name="concMed" id="cConcMedicamento">
              </div>
            </p>
            <h4>Presentación:</h4>
            <p>
              <div class="control-form">
                <input type="text" class="form-control" placeholder="Ingrese aquí la presentación del medicamento" name="precMed" id="cPrecMedicamento">
              </div>
            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary" data-dismiss="modal" onclick="crearMedicamento()">Guardar</button>
          </div>

        </div>
      </div>
  </div>

  <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="mEditarMedicamento">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Editar Medicamento</h4>
        </div>
        <div class="modal-body">
          <h4>Editar Nombre:</h4>
          <p>
              <div class="control-form">
                <input type="text" class="form-control" name="nombre" id="eNomMedicamento">
                <input type="text" class="form-control hidden" name="nombre" id="eIdMedicamento">
              </div>
          </p>
          <h4>Editar Concentración:</h4>
          <p>
              <div class="control-form">
                <input type="text" class="form-control" name="nombre" id="eConcMedicamento">
              </div>
          </p>
          <h4>Editar Presentación:</h4>
          <p>
              <div class="control-form">
                <input type="text" class="form-control" name="nombre" id="ePrecMedicamento">
              </div>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary" data-dismiss="modal" onclick="editarMedicamento()">Guardar</button>
        </div>

      </div>
    </div>
  </div>

  @endsection
  @section('script')

  <script src="{{asset('../vendors/pnotify/dist/pnotify.js')}}"></script>
  <script src="{{asset('../vendors/pnotify/dist/pnotify.buttons.js')}}"></script>
  <script src="{{asset('../vendors/pnotify/dist/pnotify.nonblock.js')}}"></script>
  <link href="{{asset('../vendors/pnotify/dist/pnotify.css')}}" rel="stylesheet">
  <link href="{{asset('../vendors/pnotify/dist/pnotify.buttons.css')}}" rel="stylesheet">
  <link href="{{asset('../vendors/pnotify/dist/pnotify.nonblock.css')}}" rel="stylesheet">


  <script>

    function crearAlergia(){
      
      var nombre = $('#cNombreAlergia').val();
      
      $.post( "{{ route('alergia.crear') }}", {nombre: nombre, _token:'{{csrf_token()}}'}).done(function(data) {
        
        $("#divAlergiaTab").empty();
        $("#divAlergiaTab").html(data.view);
        new PNotify({
                        title: 'Alérgia',
                        text: 'La alérgia fué registrada exitosamente!',
                        type: 'success',
                        styling: 'bootstrap3'
                    });
      });
      
    }
    function cargarAlergia(id,nombre){
        $('#mEditarAlergia').modal('show');
        $('#eIdAlergia').val(id);
        $('#eNombreAlergia').val(nombre);
    }
    function editarAlergia(){
        var id = $('#eIdAlergia').val();
        var nombre = $('#eNombreAlergia').val();
        
        $.post( "{{ route('alergia.editar') }}", {id:id, nombre: nombre, _token:'{{csrf_token()}}'}).done(function(data) {
          $("#divAlergiaTab").empty();
          $("#divAlergiaTab").html(data.view);
        });
        
      }
      function eliminarAlergia(id){
        $.post( "{{ route('alergia.eliminar') }}", {id:id, _token:'{{csrf_token()}}'}).done(function(data) {
          $("#divAlergiaTab").empty();
          $("#divAlergiaTab").html(data.view);
        });
      }

      function crearCie(){
      
        var codigo = $('#cCodCie').val();
        var descripcion = $('#cNomCie').val();
        var tipocie = $('#cTipoCie').val();
        
        $.post( "{{ route('cie.crear') }}", {codigo: codigo, descripcion: descripcion, tipocie: tipocie,_token:'{{csrf_token()}}'}).done(function(data) {
          $("#divCieTab").empty();
          $("#divCieTab").html(data.view);
        });
        
      }
      function cargarCie(id,codigo,descripcion,tipocie){
          $('#mEditarCie').modal('show');
          $('#eIdCie').val(id);
          $('#eCodCie').val(codigo);
          $('#eDescCie').val(descripcion);
          $('#eTipoCie').val(tipocie);
      }
      function editarCie(){
          var id = $('#eIdCie').val();
          var codigo = $('#eCodCie').val();
          var descripcion = $('#eDescCie').val();
          var tipocie = $('#eTipoCie').val();
          
          $.post( "{{ route('cie.editar') }}", {id:id, codigo: codigo, descripcion: descripcion, tipocie: tipocie, _token:'{{csrf_token()}}'}).done(function(data) {
            $("#divCieTab").empty();
            $("#divCieTab").html(data.view);
          });
          
        }
        function eliminarCie(id){
          $.post( "{{ route('cie.eliminar') }}", {id:id, _token:'{{csrf_token()}}'}).done(function(data) {
            $("#divCieTab").empty();
            $("#divCieTab").html(data.view);
          });
        }


    function crearMetodoAnticonceptivo(){
      
      var nombre = $('#cNomMetAnticonceptivo').val();
      
      $.post( "{{ route('manticonceptivo.crear') }}", {nombre: nombre, _token:'{{csrf_token()}}'}).done(function(data) {
        $("#divMetodoAnticonceptivoTab").empty();
        $("#divMetodoAnticonceptivoTab").html(data.view);
      });
      
    }
    function cargarMetodoAnticonceptivo(id,nombre){
        $('#mEditarMetAnticonceptivo').modal('show');
        $('#eIdMetAnticonceptivo').val(id);
        $('#eNomMetAnticonceptivo').val(nombre);
    }
    function editarMetodoAnticonceptivo(){
        var id = $('#eIdMetAnticonceptivo').val();
        var nombre = $('#eNomMetAnticonceptivo').val();
        
        $.post( "{{ route('manticonceptivo.editar') }}", {id:id, nombre: nombre, _token:'{{csrf_token()}}'}).done(function(data) {
          $("#divMetodoAnticonceptivoTab").empty();
          $("#divMetodoAnticonceptivoTab").html(data.view);
        });
        
    }
    function eliminarMetodoAnticonceptivo(id){
        $.post( "{{ route('manticonceptivo.eliminar') }}", {id:id, _token:'{{csrf_token()}}'}).done(function(data) {
          $("#divMetodoAnticonceptivoTab").empty();
          $("#divMetodoAnticonceptivoTab").html(data.view);
        });
      }

    function crearSed(){
      
      var nombre = $('#cNomSed').val();
      
      $.post( "{{ route('sed.crear') }}", {nombre: nombre, _token:'{{csrf_token()}}'}).done(function(data) {
        $("#divSedTab").empty();
        $("#divSedTab").html(data.view);
      });
      
    }
    function cargarSed(id,nombre){
        $('#mEditarSed').modal('show');
        $('#eIdSed').val(id);
        $('#eNomSed').val(nombre);
    }
    function editarSed(){
        var id = $('#eIdSed').val();
        var nombre = $('#eNomSed').val();
        
        $.post( "{{ route('sed.editar') }}", {id:id, nombre: nombre, _token:'{{csrf_token()}}'}).done(function(data) {
          $("#divSedTab").empty();
          $("#divSedTab").html(data.view);
        });
        
    }
    function eliminarSed(id){
        $.post( "{{ route('sed.eliminar') }}", {id:id, _token:'{{csrf_token()}}'}).done(function(data) {
          $("#divSedTab").empty();
          $("#divSedTab").html(data.view);
        });
      }

    function crearApetito(){
      
      var nombre = $('#cNomApetito').val();
      
      $.post( "{{ route('apetito.crear') }}", {nombre: nombre, _token:'{{csrf_token()}}'}).done(function(data) {
        $("#divApetitoTab").empty();
        $("#divApetitoTab").html(data.view);
      });
      
    }
    function cargarApetito(id,nombre){
      $('#mEditarApetito').modal('show');
        $('#eIdApetito').val(id);
        $('#eNomApetito').val(nombre);
    }
    function editarApetito(){
        var id = $('#eIdApetito').val();
        var nombre = $('#eNomApetito').val();
        
        $.post( "{{ route('apetito.editar') }}", {id:id, nombre: nombre, _token:'{{csrf_token()}}'}).done(function(data) {
          $("#divApetitoTab").empty();
          $("#divApetitoTab").html(data.view);
        });
        
    }
    function eliminarApetito(id){
        $.post( "{{ route('apetito.eliminar') }}", {id:id, _token:'{{csrf_token()}}'}).done(function(data) {
          $("#divApetitoTab").empty();
          $("#divApetitoTab").html(data.view);
        });
      }

    function crearDeposicion(){
      
      var nombre = $('#cNomDeposicion').val();
      
      $.post( "{{ route('deposicion.crear') }}", {nombre: nombre, _token:'{{csrf_token()}}'}).done(function(data) {
        $("#divDeposicionTab").empty();
        $("#divDeposicionTab").html(data.view);
      });
      
    }
    function cargarDeposicion(id,nombre){
        $('#mEditarDeposicion').modal('show');
        $('#eIdDeposicion').val(id);
        $('#eNomDeposicion').val(nombre);
    }
    function editarDeposicion(){
        var id = $('#eIdDeposicion').val();
        var nombre = $('#eNomDeposicion').val();
        
        $.post( "{{ route('deposicion.editar') }}", {id:id, nombre: nombre, _token:'{{csrf_token()}}'}).done(function(data) {
          $("#divDeposicionTab").empty();
          $("#divDeposicionTab").html(data.view);
        });
        
    }
    function eliminarDeposicion(id){
        $.post( "{{ route('deposicion.eliminar') }}", {id:id, _token:'{{csrf_token()}}'}).done(function(data) {
          $("#divDeposicionTab").empty();
          $("#divDeposicionTab").html(data.view);
        });
      }

    function crearOrina(){
      
      var nombre = $('#cNomOrina').val();
      
      $.post( "{{ route('orina.crear') }}", {nombre: nombre, _token:'{{csrf_token()}}'}).done(function(data) {
        $("#divOrinaTab").empty();
        $("#divOrinaTab").html(data.view);
      });
      
    }
    function cargarOrina(id,nombre){
        $('#mEditarOrina').modal('show');
        $('#eIdOrina').val(id);
        $('#eNomOrina').val(nombre);
    }
    function editarOrina(){
        var id = $('#eIdOrina').val();
        var nombre = $('#eNomOrina').val();
        
        $.post( "{{ route('orina.editar') }}", {id:id, nombre: nombre, _token:'{{csrf_token()}}'}).done(function(data) {
          $("#divOrinaTab").empty();
          $("#divOrinaTab").html(data.view);
        });
        
    }
    function eliminarOrina(id){
        $.post( "{{ route('orina.eliminar') }}", {id:id, _token:'{{csrf_token()}}'}).done(function(data) {
          $("#divOrinaTab").empty();
          $("#divOrinaTab").html(data.view);
        });
      }

    function crearSuenio(){
      
      var nombre = $('#cNomSuenio').val();
      
      $.post( "{{ route('sueño.crear') }}", {nombre: nombre, _token:'{{csrf_token()}}'}).done(function(data) {
        $("#divSuenioTab").empty();
        $("#divSuenioTab").html(data.view);
      });
      
    }
    function cargarSuenio(id,nombre){
        $('#mEditarSuenio').modal('show');
        $('#eIdSuenio').val(id);
        $('#eNomSuenio').val(nombre);
    }
    function editarSuenio(){
        var id = $('#eIdSuenio').val();
        var nombre = $('#eNomSuenio').val();
        
        $.post( "{{ route('sueño.editar') }}", {id:id, nombre: nombre, _token:'{{csrf_token()}}'}).done(function(data) {
          $("#divSuenioTab").empty();
          $("#divSuenioTab").html(data.view);
        });
        
    }
    function eliminarSuenio(id){
        $.post( "{{ route('sueño.eliminar') }}", {id:id, _token:'{{csrf_token()}}'}).done(function(data) {
          $("#divSuenioTab").empty();
          $("#divSuenioTab").html(data.view);
        });
      }

    function crearLaboratorio(){
      var nombre = $('#cNomLab').val();
      var ruc = $('#cRucLab').val();
      var direccion = $('#cDirLab').val();
      var telefono = $('#cTelLab').val();
      var correo = $('#cCorLab').val();
      
      $.post( "{{ route('laboratorio.crear') }}", {nombre: nombre, ruc: ruc, direccion: direccion, telefono: telefono, correo: correo, _token:'{{csrf_token()}}'}).done(function(data) {
        $("#divLaboratorioTab").empty();
        $("#divLaboratorioTab").html(data.view);
      });
      
    }
    function cargarLaboratorio(id,nombre,ruc,dir,tel,cor){
        $('#mEditarLab').modal('show');
        $('#eIdLab').val(id);
        $('#eNomLab').val(nombre);
        $('#eRucLab').val(ruc);
        $('#eDirLab').val(dir);
        $('#eTelLab').val(tel);
        $('#eCorLab').val(cor);
    }
    function editarLaboratorio(){
        var id = $('#eIdLab').val();
        var nombre = $('#eNomLab').val();
        var ruc = $('#eRucLab').val();
        var dir = $('#eDirLab').val();
        var tel = $('#eTelLab').val();
        var cor = $('#eCorLab').val();
        
        $.post( "{{ route('laboratorio.editar') }}", {id:id, nombre: nombre, ruc: ruc, dir: dir, tel: tel, cor: cor, _token:'{{csrf_token()}}'}).done(function(data) {
          $("#divLaboratorioTab").empty();
          $("#divLaboratorioTab").html(data.view);
        });
        
    }
    function eliminarLaboratorio(id){
        $.post( "{{ route('laboratorio.eliminar') }}", {id:id, _token:'{{csrf_token()}}'}).done(function(data) {
          $("#divLaboratorioTab").empty();
          $("#divLaboratorioTab").html(data.view);
        });
      }

      function crearMedicamento(){
        
        var nombre = $('#cNomMedicamento').val();
        var concentracion = $('#cConcMedicamento').val();
        var presentacion = $('#cPrecMedicamento').val();
        
        $.post( "{{ route('medicamento.crear') }}", {nombre: nombre, concentracion: concentracion, presentacion: presentacion, _token:'{{csrf_token()}}'}).done(function(data) {
          $("#divMedicamentoTab").empty();
          $("#divMedicamentoTab").html(data.view);
        });
        
      }
    function cargarMedicamento(id,nombre,concentracion,presentacion){
        $('#mEditarMedicamento').modal('show');
        $('#eIdMedicamento').val(id);
        $('#eNomMedicamento').val(nombre);
        $('#eConcMedicamento').val(concentracion);
        $('#ePrecMedicamento').val(presentacion);
    }
    function editarMedicamento(){
        var id = $('#eIdMedicamento').val();
        var nombre = $('#eNomMedicamento').val();
        var concentracion = $('#eConcMedicamento').val();
        var presentacion = $('#ePrecMedicamento').val();
        
        $.post( "{{ route('medicamento.editar') }}", {id:id, nombre: nombre, concentracion: concentracion, presentacion: presentacion, _token:'{{csrf_token()}}'}).done(function(data) {
          $("#divMedicamentoTab").empty();
          $("#divMedicamentoTab").html(data.view);
        });
        
    }
    function eliminarMedicamento(id){
        $.post( "{{ route('medicamento.eliminar') }}", {id:id, _token:'{{csrf_token()}}'}).done(function(data) {
          $("#divMedicamentoTab").empty();
          $("#divMedicamentoTab").html(data.view);
        });
      }

  </script>
@endsection