@extends('layouts.base')
@section('title')
 Pacientes   
@endsection
@section('contenido')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Gestion de Pacientes <small>Lista</small></h2>
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
              <th>#</th>
              <th>Nombres</th>
              <th>DNI</th>
              <th>Teléfono</th>
              <th>Correo</th>
              <th>Dirección</th>
              <th>Gestión</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($paciente as $pac)
            <tr>
              <th scope="row">{{$pac->id}}</th>
              <td>    {{$gen->nombre}} </td>
              <td>    {{$gen->doc}} </td>
              <td>    {{$gen->telefono}} </td>
              <td>    {{$gen->email}} </td>
              <td>    {{$gen->direccion}} </td>
              <td>@mdo</td>
            </tr>
            @endforeach
            
          </tbody>
        </table>

      </div>
    </div>
  </div>

   
       
    

@endsection