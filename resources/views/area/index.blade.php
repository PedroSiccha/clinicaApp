@extends('layouts.base')
@section('title')
 Área   
@endsection
@section('contenido')
<div class="col-md-6 col-sm-6 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Gestión de Área o Especialidades <small><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Nuevo</button></small></h2>
        <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">

                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                  </button>
                  <h4 class="modal-title" id="myModalLabel">Registrar Nueva Área</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal form-label-left" id="feedback_form" method="POST" action="/area">
                      {!! csrf_field() !!}
      
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Área </label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" class="form-control" placeholder="Nueva Área" name="nombre">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de Área </label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" class="form-control" placeholder="Especialidad o Administrativo" name="descripcion">
                      </div>
                    </div>
      
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                        
                          <button type="submit" class="btn btn-success" onclick="new PNotify({
                            title: 'Nuevo Género',
                            text: 'El Genero se guardo exitosamente',
                            type: 'success',
                            styling: 'bootstrap3'
                        });">Guardar</button>
                        <button type="button" class="btn btn-primary" onclick="new PNotify({
                          title: 'Error!',
                          text: 'No se pudo crear el Nuevo Género.',
                          type: 'error',
                          styling: 'bootstrap3'
                      });">Cancelar</button>
                        
                      </div>
                    </div>
      
                  </form>
                </div>
              </div>
            </div>
          </div>
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

        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Nombre de Área</th>
              <th>Tipo de Área</th>
              <th>Gestión</th>
            
            </tr>
          </thead>
          <tbody>
            @foreach ($area as $area)
            <tr>
              <th scope="row">{{$area->id}}</th>
              <td>    {{$area->nombre}} </td>
              <td>    {{$area->descrpcion}} </td>
              <td>@mdo</td>
            </tr>
            @endforeach
            
          </tbody>
        </table>

      </div>
    </div>
  </div>
@endsection