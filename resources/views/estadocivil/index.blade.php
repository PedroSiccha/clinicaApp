@extends('layouts.base')
@section('title')
 Estado Civil   
@endsection
@section('contenido')
<div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Gestión de Estado Civil <small><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Nuevo</button></small></h2>
            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
    
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                      </button>
                      <h4 class="modal-title" id="myModalLabel">Crear Nuevo Género</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal form-label-left" id="feedback_form" method="POST" action="/estadocivil/store">
                          {!! csrf_field() !!}
          
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Estado Civil </label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" placeholder="Según el DNI" name="nombre">
                          </div>
                        </div>
          
                        <div class="ln_solid"></div>
                        <div class="form-group">
                          <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                            
                            <button type="submit" class="btn btn-success" >Guardar</button>
                            <button type="button" data-dismiss="modal" class="btn btn-primary" >Cancelar</button>
                            
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
                  <th>Género</th>
                  <th>Gestión</th>
                
                </tr>
              </thead>
              <tbody>
                @foreach ($estadocivil as $eci)
                <tr>
                  <th scope="row">{{$eci->id}}</th>
                  <td>    {{$eci->nombre}} </td>
                  <td><div class="btn-group">
                        <a  href="#"><button type="button" class="btn btn-danger">Eliminar</button></a>
                        <a  href="#"><button type="button" class="btn btn-primary">Editar</button></a>           
              </div></td>
                </tr>
                @endforeach
                
              </tbody>
            </table>
    
          </div>
        </div>
      </div>
@endsection