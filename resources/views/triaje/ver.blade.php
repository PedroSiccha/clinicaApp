@extends('layouts.base')
@section('title')
 Triajes realizados
@endsection
@section('contenido')
<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>@extends('layouts.base')
@section('title')
 Lista Total de Triaje
@endsection
@section('contenido')
<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>{{ $triaje[0]->nombre }} <small><button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target=".bs-paciente-modal-lg"><i class="fa fa-plus"></i></button><a  href="paciente/crear_reporte_porpaciente" class="btn btn-sm btn-default" type="button" data-placement="top" data-toggle="tooltip" data-original-title="Imprimir"><i class="fa fa-print"></i></a></small></h2>
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
                  <th class="hidden">Nombres</th>
                  <th class="hidden">DNI</th>
                  <th class="hidden">Telefono</th>
                  <th class="hidden">Dirección</th>
                  <th>Fecha y hora de Atencón</th>
                  <th>Realizado Por:</th>
                  <th>Estado</th>
                  <th>Administrador</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($triaje as $tri)
                  <tr>
                        <th>{{ $tri->idTriaje }}</th>
                        <td class="hidden">{{ $tri->nombre }}</td>
                        <td class="hidden">{{ $tri->dni }}</td>
                        <td class="hidden">{{ $tri->telefono }}</td>
                        <td class="hidden">{{ $tri->direccion }}</td>
                        <td>{{ $tri->creacion }}</td>
                        <td>{{ $tri->usuario }}</td>
                        <td>{{ $tri->estado }}</td>
                        <td>
                                <div class="btn-group">
                                        <button class="btn btn-primary btn-xs"data-toggle="modal" data-target=".bs-editgenero-modal-lg"><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-danger btn-xs" data-toggle="modal" data-target=".bs-deletegenero-modal-lg"><i class="fa fa-eraser"></i></button>         
                                </div>
                        </td>
                      </tr>
                      
                      
                      
                  @endforeach
              </tbody>
            </table>

          </div>
        </div>
      </div>
      

@endsection <small><button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target=".bs-paciente-modal-lg"><i class="fa fa-plus"></i></button><a  href="paciente/crear_reporte_porpaciente" class="btn btn-sm btn-default" type="button" data-placement="top" data-toggle="tooltip" data-original-title="Imprimir"><i class="fa fa-print"></i></a></small></h2>
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
                  <th>Dirección</th>
                  <th>Fecha y hora de Atencón</th>
                  <th>Realizado Por:</th>
                  <th>Estado</th>
                  <th>Administrador</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($triaje as $tri)
                  <tr>
                        <th>{{ $tri->idTriaje }}</th>
                        <td>{{ $tri->nombre }}</td>
                        <td>{{ $tri->dni }}</td>
                        <td>{{ $tri->telefono }}</td>
                        <td>{{ $tri->direccion }}</td>
                        <td>{{ $tri->creacion }}</td>
                        <td>{{ $tri->usuario }}</td>
                        <td>{{ $tri->estado }}</td>
                        <td>
                                <div class="btn-group">
                                        <button class="btn btn-primary btn-xs"data-toggle="modal" data-target=".bs-editgenero-modal-lg"><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-danger btn-xs" data-toggle="modal" data-target=".bs-deletegenero-modal-lg"><i class="fa fa-eraser"></i></button>         
                                </div>
                        </td>
                      </tr>
                      
                      
                      
                  @endforeach
              </tbody>
            </table>

          </div>
        </div>
      </div>
      

@endsection