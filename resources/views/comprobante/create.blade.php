@extends('layouts.base')
@section('title')
 Pagar Cita   
@endsection
@section('contenido')
<div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Pacientes con citas pendientes <small>Users</small></h2>
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

              <table id="datatable" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Nombre del Paciente</th>
                    <th>Especialidad</th>
                    <th>Fecha de Atención</th>
                    <th>Pagar</th>
                  </tr>
                </thead>


                <tbody>
                        <?php $numOrden = 1; ?>
                        @foreach($cita as $cDi)
                        
                        <tr>
                                 <!--<td>{{$numOrden}}</td>-->
                                <td>{{ $cDi->nombre }}</td>
                                <td>{{ $cDi->especialidad }}</td>
                                <td>{{ $cDi->fecAten }}</td>
                                <td>
                                        <div class="btn-group">
                                         <button type="button" class="btn btn-primary" data-toggle="modal"  <?php $citas_id = $cDi->idCitas; $areas_id = $cDi->idArea;  $nombre = $cDi->nombre ?>  data-target=".bs-ValidarPago-modal-lg">Validar</button>
                                         <button type="button" class="btn btn-default" data-toggle="modal" data-target=".bs-VerMasInformacion-modal-lg">Ver</button>
                                        </div>
                                </td>
                              </tr>
                              <?php    $numOrden = $numOrden + 1; ?>
                        @endforeach
                  
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- Modal Para Pagar -->
        <form class="form-horizontal form-label-left" method="POST" action="/comprobante">
            {!! csrf_field() !!}

        <div class="modal fade bs-ValidarPago-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">

                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                      </button>
                      <h4 class="modal-title" id="myModalLabel"><?php echo $nombre; ?></h4>
                    </div>
                    <div class="modal-body">
                      <h4>Fecha de Validacion: <?php echo $fechaActual = date('d/m/Y'); ?><input name = "fecha" class="hidden" value="<?php echo $fechaActual = date('Y-m-d H:i:s'); ?>"> </h4>
                      <div class="form-group">
                    <label class="control-label col-md-3" for="first-name">Ingrese Código de Comprobante <span class="required">*</span>
                    </label>
                    <div class="col-md-7">
                      <input type="text" id="first-name2" required="required" class="form-control col-md-7 col-xs-12" name="serie">
                      <input type="text" id="first-name2" required="required" class="form-control col-md-7 col-xs-12 hidden" value="<?php echo $citas_id; ?>" name="citas_id">
                      <input type="text" id="first-name2" required="required" class="form-control col-md-7 col-xs-12 hidden" value="<?php echo $areas_id; ?>" name="areas_id">
                    </div>
                  </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                      <button type="submit" class="btn btn-primary">Validar</button>
                    </div>

                  </div>
                </div>
              </div>
            </form>
            <!-- Fin Modal Validar -->

            <!-- Modal Para VER -->
            <div class="modal fade bs-VerMasInformacion-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
    
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel"><?php echo $nombre; ?></h4>
                        </div>
                        <div class="modal-body">
                          <h4>Información de la Cita</h4>
                          <div class="form-group">
                        
                      </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                          <button type="submit" class="btn btn-primary">Validar</button>
                        </div>
    
                      </div>
                    </div>
                  </div>


@endsection