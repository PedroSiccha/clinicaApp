@extends('layouts.base')
@section('title')
 Lista de Citas   
@endsection
@section('contenido')
<div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Lista de Citas <small>Users</small></h2>
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
                    <th>Número de Atención</th>
                    <th>Nombre del Paciente</th>
                    <th>Edad</th>
                    <th>Especialidad</th>
                    <th>Fecha de Atención</th>
                    <th>Hora de Atención</th>
                  </tr>
                </thead>


                <tbody>
                        <?php $numOrden = 1; ?>
                        @foreach($citaDisp as $cDi)
                        
                        <tr>
                                <td>{{$numOrden}}</td>
                                <td>{{ $cDi->nombre }}</td>
                                <td>{{ $cDi->edad }}</td>
                                <td>{{ $cDi->especialidad }}</td>
                                <td>{{ $cDi->fecAten }}</td>
                                <td>{{ $cDi->horaAten }}</td>
                              </tr>
                              <?php    $numOrden = $numOrden + 1; ?>
                        @endforeach
                  
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
@endsection