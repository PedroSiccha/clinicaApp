@extends('layouts.base')
@section('title')
 Registro de Empleados 
@endsection
@section('contenido')
<div class="clearfix"></div>

<div class="row">
    <!-- Tabla de Vista de Usuarios -->
  <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Género <small>

            <a type="button" class="btn btn-default btn-sm" href="{{ url('usuario/create') }}"><i class="fa fa-plus"></i></a>

          </small></h2>
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
                <th>Nombre</th>
                <th>DNI</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Tipo de Usuario</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($empleado as $emp)
                <tr>
                      <th>#</th>
                      <td>{{ $emp->nombre }}</td>
                      <td>{{ $emp->dni }}</td>
                      <td>{{ $emp->email }}</td>
                      <td>{{ $emp->telefono }}</td>
                      <td>{{ Auth::user()->roles->implode('name', ',') }}</td>
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
    <!-- Fin Tabla -->

    <!-- MODAL CREAR Usuario -->
  <div class="modal fade bs-usuario-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <form class="form-horizontal form-label-left" id="feedback_form" method="POST" action="/usuario/store">
            {!! csrf_field() !!}
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Nuevo Genero</h4>
            </div>
            <div class="modal-body">
              <h4>Registrar Género:</h4>
              <p>
                  <div class="control-form">
                    <input type="text" class="form-control" placeholder="Ingrese aquí el género nuevo" name='nombre'>
                  </div>
               </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </div>
        </div>
    </form>
  </div>
@endsection