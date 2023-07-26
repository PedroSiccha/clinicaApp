@extends('layouts.base')
@section('contenido')
<div class="row top_tiles">
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12" >
        <a data-toggle="modal" data-target=".bs-example-modal-lg">
      <div class="tile-stats">
        <div class="icon"><i class="fa fa-pencil-square-o"></i></div>
        <div class="count">0</div>
        <h3>Nueva Cita</h3>
        <p> Generar cita Médica.</p>
      </div>
        </a>
        
    </div>
    <a href="/comprobante/create">
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-money"></i></div>
          <div class="count">0</div>
          <h3>Validar Cita Cita</h3>
          <p> Cancele su Cita.</p>
        </div>
      </div>
      </a>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="tile-stats">
        <div class="icon"><i class="fa fa-male"></i></div>
        <div class="count">0</div>
        <h3>Nueva Historia Clínica</h3>
        <p> Generar Nueva Historia.</p>
      </div>
    </div>
    
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="tile-stats">
        <div class="icon"><i class="fa fa-file-pdf-o"></i></div>
        <div class="count">0</div>
        <h3>Informe Médico</h3>
        <p> Visualizar Informe.</p>
      </div>
    </div>
  </div>
  <form class="form-horizontal form-label-left" id="feedback_form" method="GET" action="/cita/create">
  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Inserte DNI del Paciente</h4>
          </div>
          <div class="modal-body">
            <h4>DNI:</h4>
            <input type="text" id="doc" name="doc" required="required" class="form-control">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Aceptar</button>
          </div>

        </div>
      </div>
    </div>
  </form>
@endsection

<!-- Codigo PHP -->