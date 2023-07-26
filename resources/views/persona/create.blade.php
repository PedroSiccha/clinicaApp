@extends('layouts.base')
@section('title')
 Registrar Pacientes   
@endsection

@section('contenido')

<div id="wizard" class="form_wizard wizard_horizontal">
    <div class="x_panel">
        <div class="x_title">
          <h2>Datos Personales <small>del Paciente</small></h2>
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
          <br />
          <form class="form-horizontal form-label-left input_mask" method="POST" action="/persona">
            {!! csrf_field() !!}
            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
              <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Nombres" name="nombres">
              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
              <input type="text" class="form-control" id="inputSuccess3" placeholder="Apellidos" name="apellidos">
              <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="date" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Fecha de Nacimiento" name="fecnac">
                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
              </div>
  
              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="text" class="form-control" id="inputSuccess3" placeholder="Edad" name="edad">
                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Tipo de Documento" name="tipodoc">
                  <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                </div>
    
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  <input type="text" class="form-control" id="inputSuccess3" placeholder="DNI" name="doc">
                  <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                </div>

            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
              <input type="text" class="form-control has-feedback-left" id="inputSuccess4" placeholder="Dirección" name="direccion">
              <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
              <input type="text" class="form-control" id="inputSuccess5" placeholder="Telefono" name="telefono">
              <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Genero</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                  <?php 
                  echo "<select class='form-control center' id='gnero' name='generos_id'>";
                  foreach ($genero as $clave=>$gen){
                      echo "<option value=".$gen->id.">$gen->nombre</option>";
                  }
                  echo "</select>";               
                    ?>
              </div>
            </div>
            
            
            
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                <button type="button" class="btn btn-primary">Cancel</button>
     <button class="btn btn-primary" type="reset">Reset</button>
                <button type="submit" class="btn btn-success" href="/paciente/create">Guardar</button>
              </div>
            </div>

          </form>
        </div>
      </div>
      </div>
@endsection