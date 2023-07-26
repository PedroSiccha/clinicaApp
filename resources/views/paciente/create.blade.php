@extends('layouts.base')
@section('title')
 Registrar Pacientes   
@endsection

@section('contenido')

<?php
    
    if($dni[0]=null){
        
        $nombre = $pac[0]->nombres;
        $inputNombre = "<input type='text' class='form-control has-feedback-left' name='nombres' value='".$nombre."'>";
        $apellido = $pac[0]->apellidos;
        $inputApellido = "<input type='text' class='form-control has-feedback-left' name='apellidos' value='".$apellido."'>";
        $fecnac = $pac[0]->fecnac;
        $inputFechaNacimiento = "<input type='date' class='form-control has-feedback-left' name='fecnac' value='".$fecnac."'>";
        $edad = $pac[0]->edad;
        $inputEdad = "<input type='text' class='form-control has-feedback-left' name='edad' value='".$edad."'>";
        $tipodoc = $pac[0]->tipodoc;
        $inputTipoDocumento = "<input type='text' class='form-control has-feedback-left' name='tipodoc' value='".$tipodoc."'>";
        $doc = $pac[0]->doc;
        $inputDocumento = "<input type='text' class='form-control has-feedback-left' name='doc' value='".$doc."'>";
        $telefono = $pac[0]->telefono;
        $inputTelefono = "<input type='text' class='form-control has-feedback-left' name='telefono' value='".$telefono."'>";
        $direccion = $pac[0]->direccion;
        $inputDireccion = "<input type='text' class='form-control has-feedback-left' name='direccion' value='".$direccion."'>";
        $genero = $pac[0]->generos_id;
        $inputGenero = "<input type='text' class='form-control has-feedback-left' name='generos_id' value='".$genero."'>";
        $clase = "class='btn btn-success hidden'";
        
    }else{
        $inputNombre = "<input type='text' class='form-control has-feedback-left' name='nombres' placeholder='Nombres'>";
        
        $inputApellido = "<input type='text' class='form-control has-feedback-left' name='apellidos' placeholder='Apellidos'>";
        
        $inputFechaNacimiento = "<input type='date' class='form-control has-feedback-left' name='fecnac' placeholder='Fecha de Nacimiento'>";
    
        $inputEdad = "<input type='text' class='form-control has-feedback-left' name='edad' placeholder='Edad'>";
        
        $inputTipoDocumento = "<input type='text' class='form-control has-feedback-left' name='tipodoc' placeholder='Tipo de Documento'>";
        
        $inputDocumento = "<input type='text' class='form-control has-feedback-left' name='doc' placeholder='Documento de Identidad'>";
        
        $inputTelefono = "<input type='text' class='form-control has-feedback-left' name='telefono' placeholder='Telefono'>";
        
        $inputDireccion = "<input type='text' class='form-control has-feedback-left' name='direccion' placeholder='Direccion'>";
        
        $inputGenero = "<input type='text' class='form-control has-feedback-left' name='generos_id' placeholder='Genero'>";

        $clase = "class='btn btn-success'";
    }
    
    
?>

<div class="page-title">
        <div class="title_left">
          <h3>Generar Cita</h3>
        </div>    
</div>
<div class="clearfix"></div>

<div class="x_panel">
        <div class="x_title">
          <h2>Paciente <small>datos personales</small></h2>
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
          <div class="x_panel">
                {!! Form::open(['route' => 'cita.create', 'method' => 'GET','class' => 'navbar-form pull-left']) !!}
                {!! Form::text('doc', null, ['class' => 'form-control', 'placeholder' => 'DNI']) !!}
                {!! Form::close() !!}
        </div>
          <form class="form-horizontal form-label-left input_mask" method="POST" action="/persona">
            {!! csrf_field() !!}
            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <?php
                     echo $inputNombre;
                    ?>
              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
            </div>

            

            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <?php
                    echo $inputApellido;
                ?>
              <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <?php
                     echo $inputFechaNacimiento;
                    ?>
                <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <?php
                    echo $inputEdad;
                    ?>
              <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <?php
                    echo $inputTipoDocumento;
                    ?>
                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <?php
                    echo $inputDocumento;
                    ?>
                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <?php
                    echo $inputDireccion;
                    ?>
              <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <?php
                    echo $inputGenero;
                    ?>
              <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
            </div>
           
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                <button type="button" class="btn btn-primary">Cancelar</button>
                 <button class="btn btn-primary" type="reset">Limpiar</button>
                 
                      <button type="submit" <?php echo $clase;?>  data-toggle="collapse"  href="#collapseTwo1"   >Siguiente</button>
                   
              </div>
            </div>

          </form>
        </div>
      </div>

      <div class="accordion" id="accordion1" role="tablist" aria-multiselectable="true">
            
            <div class="panel">
              
              <div id="collapseTwo1" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                
                        <div class="x_panel">
                                <div class="x_title">
                                  <h2>Paciente... <small>datos complementarios</small></h2>
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
                                  <form class="form-horizontal form-label-left input_mask">
                        
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Lugar de Nacimiento">
                                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                        
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <input type="text" class="form-control" id="inputSuccess3" placeholder="Lugar de Procedencia" >
                                      <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                                    </div>
                        
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <input type="text" class="form-control has-feedback-left" id="inputSuccess4" placeholder="Correo Electrónico" >
                                      <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                        
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                        
                                      <input type="text" class="form-control" id="inputSuccess5" placeholder="Personas_id" >
                                      <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                                    </div>
                        
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Estado Civil" >
                                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                        
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <input type="text" class="form-control" id="inputSuccess3" placeholder="Grado de Instrucción" >
                                      <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                                    </div>
                                   
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                      <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <button type="button" class="btn btn-primary">Cancelar</button>
                                         <button class="btn btn-primary" type="reset">Limpiar</button>
                                        <button type="submit" class="btn btn-success">Guardar</button>
                                      </div>
                                    </div>
                        
                                  </form>
                                </div>
                              </div>

                </div>
              </div>
            </div>
            
          </div>
          <!-- end of accordion -->


        </div>
      </div>
    </div>

      <div class="x_panel">
            <div class="x_title">
              <h2>Cita Médica <small>...</small></h2>
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
              <form class="form-horizontal form-label-left input_mask" >
    
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Especialidad">
                  <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                </div>
    
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  <input type="text" class="form-control" id="inputSuccess3" placeholder="Médico">
                  <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                </div>
    
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  <input type="text" class="form-control has-feedback-left" id="inputSuccess4" placeholder="Fecha de la Cita y Hora">
                  <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                </div>
    
                
               
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                    <button type="button" class="btn btn-primary"  data-toggle="modal" data-target=".bs-comprobante-modal-lg">Comprobante</button>
                     <button class="btn btn-primary" type="reset" >Limpiar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                  </div>
                </div>
    
              </form>
            </div>
          </div>
          <div class="modal fade bs-comprobante-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">

                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                      </button>
                      <h4 class="modal-title" id="myModalLabel">Comprobante de Pago <small>Fecha de Comprobante</small></h4>
                    </div>
                    <div class="modal-body">
                    
                            <form class="form-horizontal form-label-left input_mask">
                        
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Número de Comprobante">
                                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                        
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <input type="text" class="form-control" id="inputSuccess3" placeholder="Serie de Comprobante">
                                      <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                                    </div>
                        
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <input type="text" class="form-control has-feedback-left" id="inputSuccess4" placeholder="Tipo de Comprobante">
                                      <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                        
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <input type="text" class="form-control" id="inputSuccess5" placeholder="Fecha de Atención">
                                      <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                                    </div>
                        
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Especialidad" >
                                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                        
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <input type="text" class="form-control" id="inputSuccess3" placeholder="Médico">
                                      <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                            <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Paciente" >
                                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                          </div>
                              
                                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                            <input type="text" class="form-control" id="inputSuccess3" placeholder="Monto Por Consulta">
                                            <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                                          </div>
                                    
                        
                                  </form>
                        
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                      <button type="button" class="btn btn-primary">Pagar</button>
                    </div>

                  </div>
                </div>
              </div>
@endsection