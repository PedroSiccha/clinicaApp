@extends('layouts.base')
@section('title')
 Generar Citas   
@endsection
@section('contenido')

<?php


    if (empty($dni)) {


        $inputNombre = "<input type='text' class='form-control has-feedback-left' name='nombres' placeholder='Nombres'>";
        
        $inputApellido = "<input type='text' class='form-control has-feedback-left' name='apellidos' placeholder='Apellidos'>";
        
        $inputFechaNacimiento = "<input type='date' class='form-control has-feedback-left' name='fecnac' id='feca' placeholder='Fecha de Nacimiento'>";
    
        $inputEdad = "<input type='text' class='form-control has-feedback-left' name='edad' placeholder='Edad'>";
        
        $inputTipoDocumento = "<input type='text' class='form-control has-feedback-left' name='tipodoc' placeholder='Tipo de Documento'>";
        
        $inputDocumento = "<input type='text' class='form-control has-feedback-left' name='doc' placeholder='Documento de Identidad' value='".$_GET['doc']."' readonly=”readonly”>";
        
        $inputTelefono = "<input type='text' class='form-control has-feedback-left' name='telefono' placeholder='Telefono'>";
        
        $inputDireccion = "<input type='text' class='form-control has-feedback-left' name='direccion' placeholder='Direccion'>";
        
        $inputGenero = "<input type='text' class='form-control has-feedback-left' name='generos_id' placeholder='Genero'>";

        $clase = "class='btn btn-success'";
        $labelId = "";

        function mostrarGenero($txt) {

        echo "<select class='form-control center' id='gnero' name='generos_id'>";
      foreach ($txt as $gen){
          echo "<option value=".$gen->id.">$gen->nombre</option>";
      }
      echo "</select>";

}
        
        $labelNombre = "";
        $Claseocultar = '';
    }else{
        if (empty($dni2[0]->doc)) {
            $inputNombre = "<input type='text' class='form-control has-feedback-left' name='nombres' placeholder='Nombres'>";
        
        $inputApellido = "<input type='text' class='form-control has-feedback-left' name='apellidos' placeholder='Apellidos'>";
        
        $inputFechaNacimiento = "<input type='date' class='form-control has-feedback-left' name='fecnac' id='feca' placeholder='Fecha de Nacimiento'>";
    
        $inputEdad = "<input type='text' class='form-control has-feedback-left' name='edad' placeholder='Edad'>";
        
        $inputTipoDocumento = "<input type='text' class='form-control has-feedback-left' name='tipodoc' placeholder='Tipo de Documento'>";
        
        $inputDocumento = "<input type='text' class='form-control has-feedback-left' name='doc' placeholder='Documento de Identidad' value='".$_GET['doc']."' readonly=”readonly”>";
        
        $inputTelefono = "<input type='text' class='form-control has-feedback-left' name='telefono' placeholder='Telefono'>";
        
        $inputDireccion = "<input type='text' class='form-control has-feedback-left' name='direccion' placeholder='Direccion'>";
        
        $inputGenero = "<input type='text' class='form-control has-feedback-left' name='generos_id' placeholder='Genero'>";

        $labelNombre = "";
        $labelId = "";
        function mostrarGenero($txt) {

echo "<select class='form-control center' id='gnero' name='generos_id'>";
      foreach ($txt as $gen){
          echo "<option value=".$gen->id.">$gen->nombre</option>";
      }
      echo "</select>";

}
        $clase = "class='btn btn-success'";
        $Claseocultar = '';
        }else{

        $nombre = $pac[0]->nombres;
        $inputNombre = "<input type='text' class='form-control has-feedback-left hidden' name='nombres' value='".$nombre."'>";
        $apellido = $pac[0]->apellidos;
        $inputApellido = "<input type='text' class='form-control has-feedback-left hidden' name='apellidos' value='".$apellido."'>";
        $labelNombre = "<h1>".$nombre." ".$apellido."</h1>";
        $fecnac = $pac[0]->fecnac;
        $inputFechaNacimiento = "<input type='date' class='form-control has-feedback-left hidden' name='fecnac' value='".$fecnac."'>";
        $edad = $pac[0]->edad;
        $inputEdad = "<input type='text' class='form-control has-feedback-left hidden' name='edad' value='".$edad."'>";
        $tipodoc = $pac[0]->tipodoc;
        $inputTipoDocumento = "<input type='text' class='form-control has-feedback-left hidden' name='tipodoc' value='".$tipodoc."'>";
        $dn = $_GET['doc'];
        $inputDocumento = "<input type='text' class='form-control has-feedback-left hidden' name='doc' value='".$_GET['doc']."'>";
        $telefono = $pac[0]->telefono;
        $inputTelefono = "<input type='text' class='form-control has-feedback-left hidden' name='telefono' value='".$telefono."'>";
        $direccion = $pac[0]->direccion;
        $inputDireccion = "<input type='text' class='form-control has-feedback-left hidden' name='direccion' value='".$direccion."'>";
        $genero = $pac[0]->generos_id;
        $inputGenero = "<input type='text' class='form-control has-feedback-left hidden' name='generos_id' value='".$genero."'>";
        $clase = "class='btn btn-success hidden'";

        $labelId = $pac[0]->id;

        function mostrarGenero($txt) {

        echo "<select class='form-control center' id='gnero' name='generos_id'>";
        
          echo "<option ></option>";
      
      echo "</select>";

}

        $Claseocultar = 'hidden';

        }
    }



    
    
    
?>

<div class="page-title">
        <div class="title_left">
          <h3>Generar Cita</h3>
        </div>    
</div>
<div class="x_panel">
        <div class="x_title">
          <h2>Paciente <small><?php echo $labelNombre ?></small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Settings 1</a>
                </li>
                <li><a href="#">Settings 2</a>
                </li>
              </ul>
            </li>
            <li><a class="close-link "><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix "></div>
        </div>
        <div class="x_content <?php echo $Claseocultar; ?>">
          <br />
          
          <form class="form-horizontal form-label-left input_mask" method="POST" action="/paciente">
            {!! csrf_field() !!}
            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback <?php echo $Claseocultar; ?>">
                    <?php
                     echo $inputNombre;
                    ?>
              <span class="fa fa-user form-control-feedback left <?php echo $Claseocultar; ?>"  aria-hidden="true"></span>
            </div>

            

            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback <?php echo $Claseocultar; ?>">
                <?php
                    echo $inputApellido;
                ?>
              <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback <?php echo $Claseocultar; ?>">
                    <?php
                     echo $inputFechaNacimiento;
                    ?>
                <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback <?php echo $Claseocultar; ?>">
                    <?php
                    echo $inputEdad;
                    ?>
              <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback <?php echo $Claseocultar; ?>">
                    <?php
                    echo $inputTipoDocumento;
                    ?>
                <span class="fa fa-user form-control-feedback left <?php echo $Claseocultar; ?>" aria-hidden="true"></span>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback <?php echo $Claseocultar; ?>">
                    <?php
                    echo $inputDocumento;
                    ?>
                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback <?php echo $Claseocultar; ?>">
                    <?php
                    echo $inputDireccion;
                    ?>
              <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback <?php echo $Claseocultar; ?>">
            <?php 
                mostrarGenero($genero);       
                ?>
              <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
            </div>
           
            <div class="ln_solid"></div>
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
                          
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Lugar de Nacimiento" name="lugarnac">
                              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            </div>
                
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <input type="text" class="form-control" id="inputSuccess3" placeholder="Lugar de Procedencia" name="lugarproc">
                              <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <input type="text" class="form-control has-feedback-left" id="inputSuccess4" placeholder="Correo Electrónico" name="email">
                              <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                            </div>
                
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                
                            <input type="text" class="form-control hidden" id="inputSuccess5" placeholder="Personas_id" name="personas_id" value="{{$idPersona[0]->idPer}}">
                              <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                            </div>
                
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <?php 
                                    echo "<select class='form-control center' id='estadocivils_id' name='estadocivils_id'>";
                                    foreach ($estadocivil as $clave=>$eci){
                                        echo "<option value=".$eci->id.">$eci->nombre</option>";
                                    }
                                    echo "</select>";               
                                      ?>
                              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            </div>
                
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <?php 
                                    echo "<select class='form-control center' id='instruccions_id' name='instruccions_id'>";
                                    foreach ($instruccion as $clave=>$ins){
                                        echo "<option value=".$ins->id.">$ins->nombre</option>";
                                    }
                                    echo "</select>";               
                                      ?>
                              <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                           
                            <div class="ln_solid"></div>
                            <div class="form-group">
                              <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                
                                 <button class="btn btn-primary" type="reset">Limpiar</button>
                                 
                                <button type="submit" class="btn btn-success" href="/cita/create?doc={{$_GET['doc']}}" >Guardar</button>
                              </div>
                            </div>
                
                          </form>
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
              
              <form class="form-horizontal form-label-left input_mask" method="POST" action="/cita">
                {!! csrf_field() !!}
    
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <?php 
                        echo "<select class='form-control center' id='especialidades_id' name='areas_id'>";
                        foreach ($especialidad as $clave=>$esp){
                            echo "<option value=".$esp->id.">$esp->nombre</option>";
                        }
                        echo "</select>";               
                          ?>
                  <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                </div>
    
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  <input type="text" class="form-control" id="inputSuccess3" placeholder="Médico">
                  <input type="text" class="form-control hidden" name="pacientes_id" id="inputSuccess3" value="<?php echo   $labelId; ?>">
                  <input type="text" class="form-control hidden" name="fechaexp" id="inputSuccess3" value="<?php echo   date("Y") . "/" . date("m") . "/" .date("d"); ?>">
                  <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                </div>
    
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  <input type="date" name="fechaaten" class="form-control has-feedback-left" id="inputSuccess4" placeholder="Fecha de la Cita y Hora">
                  <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                </div>
                
                <div class='col-sm-4'>
                    
                    <div class="form-group">
                        <div class='input-group date' id='myDatepicker3'>
                            <input type='text' class="form-control" name="horatenc"/>
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
                
               
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                     <button class="btn btn-primary" type="reset" >Limpiar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                  </div>
                </div>
    
              </form>
            </div>
          </div>
          

             

@endsection

@section('script')
    

<script>
        $('#myDatepicker').datetimepicker();
        
        $('#myDatepicker2').datetimepicker({
            format: 'DD.MM.YYYY'
        });
        
        $('#myDatepicker3').datetimepicker({
            format: 'hh:mm A'
        });
        
        $('#myDatepicker4').datetimepicker({
            ignoreReadonly: true,
            allowInputToggle: true
        });
    
        $('#datetimepicker6').datetimepicker();
        
        $('#datetimepicker7').datetimepicker({
            useCurrent: false
        });
        
        $("#datetimepicker6").on("dp.change", function(e) {
            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
        });
        
        $("#datetimepicker7").on("dp.change", function(e) {
            $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
        });
    </script>
    @endsection