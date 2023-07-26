@extends('layouts.base')
@section('title')   
 História Médica   
@endsection
@section('contenido')       
<script>
  function numeros(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " 0123456789,";
    especiales = [8,37,39,46];
 
    tecla_especial = false
    for(var i in especiales){   
 if(key == especiales[i]){
     tecla_especial = true;
     break;
        } 
    }
 
    if(letras.indexOf(tecla)==-1 && !tecla_especial)
        return false;
}


</script>
<div class="col-md-13 col-sm-13 col-xs-12" role="main">
        
                <div class="">
                  <div class="page-title">
                    <div class="title_left">
                            <h3>{{ $paciente[0]->nombre }}</h3>      
                    </div>
      
                    
                  </div>
                  <div class="clearfix"></div>
      
                  <div class="row">
      
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="x_panel">
                        <div class="x_title">
                          <h2>Registro de Triaje <small></small></h2>
                          <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                          </ul>
                          <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
      
      
                          <!-- Smart Wizard -->
                          <p>Registre el triaje para poder pasar a consulta.</p>
                          <div id="wizard" class="form_wizard wizard_horizontal">
                            <ul class="wizard_steps">
                              <li>
                                <a href="#step-1">
                                  <span class="step_no">1</span>
                                  <span class="step_descr">
                                    Antecedentes Personales<br />
                                    <small>Etapa 1</small>
                                  </span>
                                </a>
                              </li>
                              <li>
                                <a href="#step-2">
                                  <span class="step_no">2</span>
                                  <span class="step_descr">
                                    Antecedentes Patológicos<br />
                                    <small>Etapa 2</small>
                                  </span>
                                </a>
                              </li>
                              <li>
                                <a href="#step-3">
                                  <span class="step_no">3</span>
                                  <span class="step_descr">
                                    Alergias<br />
                                    <small>Etapa 3</small>
                                  </span>
                                </a>
                              </li>
                              <li>
                                  <a href="#step-4">
                                    <span class="step_no">4</span>
                                    <span class="step_descr">
                                      Exámen Clinico<br />
                                      <small>Etapa 4</small>
                                    </span>
                                  </a>
                                </li>
                            </ul>
                                <input type="text" class="hidden" value="{{ $paciente[0]->idCita }}" name="idCita" id="idCita">
                            <div id="step-1">
                                    
                                    <h2 class="StepTitle">Antecedentes Personales</h2>
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <label class="control-label col-md-5 col-sm-5 col-xs-12">FUR</label>
                                      <input type="date" class="form-control has-feedback-left" id="fecRegla" name="fecultimregla" required value = "{{ $triaje1[0]->fecultimregla }}">
                                    </div>
                                          
                                    <div class="col-md-6 col-sm-12 col-xs-12 form-group has-feedback">
                                      <label class="control-label col-md-5 col-sm-12 col-xs-12">G</label>
                                      <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                                  <select class="form-control" name="cangestaciones" id="cantGesta" value = "{{ $triaje1[0]->cangestaciones }}">
                                                      <option value="0">0</option>
                                                      <option value="1">1</option>
                                                      <option value="2">2</option>
                                                      <option value="3">3</option>
                                                      <option value="4">4</option>
                                                      <option value="5">5</option>
                                                      <option value="6">6</option>
                                                      <option value="7">7</option>
                                                      <option value="8">8</option>
                                                      <option value="9">9</option>
                                                      <option value="10">10</option>
                                                      <option value="11">11</option>
                                                      <option value="12">12</option>
                                                      <option value="13">13</option>
                                                      <option value="14">14</option>
                                                      <option value="15">15</option>
                                                      <option value="16">16</option>
                                                      <option value="17">17</option>
                                                      <option value="18">18</option>
                                                      <option value="19">19</option>
                                                      <option value="20">20</option>
                                                  </select>
                                      </div>
                                                <label class="control-label col-md-2 col-sm-2 col-xs-12">P</label>
                                      <div class="col-md-2 col-sm-12 col-xs-12 form-group">
                                          <input type="text"  class="form-control col-md-3" id="p1" required="required" value = "{{ $triaje1[0]->valora }}">
                                      </div>
                                      <div class="col-md-2 col-sm-12 col-xs-12 form-group">
                                          <input type="text"  class="form-control col-md-3" id="p2" required="required" value = "{{ $triaje1[0]->valorb }}">
                                      </div>
                              
                                      <div class="col-md-2 col-sm-12 col-xs-12 form-group">
                                          <input type="text"  class="form-control col-md-3" id="p3" required="required" value = "{{ $triaje1[0]->valorc }}">
                                      </div>
                              
                                      <div class="col-md-2 col-sm-12 col-xs-12 form-group">
                                          <input type="text"  class="form-control col-md-3" id="p4" required="required" value = "{{ $triaje1[0]->valord }}">
                                      </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <label class="control-label col-md-5 col-sm-5 col-xs-12">PAP</label>
                                      <input type="text" class="form-control has-feedback-left" id="fecNicolao" name="paoanicolao" value = "{{ $triaje1[0]->papanicolao }}">
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <label class="control-label col-md-5 col-sm-5 col-xs-12">MAC</label>
                                      <select class="form-control col-md-9 col-sm-9 col-xs-12" name="metodoantic" id="metAntic" value = "{{ $triaje1[0]->manticonceptivos }}">
                                        @foreach ($metodo as $me)
                                        <option value="{{ $me->id }}">{{ $me->nombre }}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                    
                            </div>
                            <div id="step-2">
                              <h2 class="StepTitle">Antecedentes Patológicos</h2>
                              <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Antecedente <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                      <textarea class="form-control" rows="3" placeholder="Registre su antecedente" name="nombrePatologia" id="detPatologia" required>{{ $triaje2[0]->nombre }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div id="step-3">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="x_panel">
                                      <div class="x_title">
                                        <h2>Alérgias Médicas</h2>
                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target=".bs-alergia-modal-lg"><i class="fa fa-plus"></i></button>
                                        <div class="clearfix"></div>
                                      </div>
                    
                                      <div class="x_content" id="divAlergia">
                                        <div class="table-responsive">
                                          <table class="table table-striped jambo_table bulk_action">
                                            <thead>
                                              <tr class="headings">
                                                <th>
                                                  <input type="checkbox" id="check-all" class="flat">
                                                </th>
                                                <th class="column-title">Código </th>
                                                <th class="column-title">Alérgia </th>
                                                <th class="bulk-actions" colspan="7">
                                                  <a class="antoo" style="color:#fff; font-weight:500;">Alérgias Seleccionadas ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                                </th>
                                              </tr>
                                            </thead>
                    
                                            <tbody>
                                              <input type="text" hidden="true" value="{{ $num[0]->num }}" id="num">
                                              @foreach ($alergia as $al)
                                                <tr class="even pointer">
                                                  <td class="a-center ">
                                                    <input type="checkbox" class="flat chekboxses" name="idAlergia[]" value="{{ $al->id }}" id="idAlergia">
                                                  </td>
                                                  <td class=" ">{{ $al->id }}</td>
                                                  <td class=" ">{{ $al->nombre }}</td>
                                                </tr>    
                                              @endforeach
                                            </tbody>
                                          </table>
                                        </div>
                                  
                                
                                      </div>
                                    </div>
                                  </div>
                            </div>
                            <div id="step-4">
                              <h2 class="StepTitle">Exámenes Clinicos</h2>
                              <div class="form-group">
                                <div class="x_content">
                                    <div class="table-responsive">
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                  <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                    <input type="text" class="form-control" id="presSistolica" placeholder="Presión Sistólica" onkeypress="return numeros(event);" required>
                                  </div>
                                  <div class="col-md-6 col-sm-12 col-xs-12 form-group">  
                                    <input type="text" class="form-control" id="presDiastolica" placeholder="Presión Diastólica" onkeypress="return numeros(event);">
                                  </div>
                                  
                                </div>
          
                                </div>
                                </div>
          
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                  <input type="text" class="form-control" id="pulso" placeholder="Pulso" onkeypress="return numeros(event);">
                                  <span class="form-control-feedback right" aria-hidden="true">X'</span>
                                </div>
          
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                  <input type="text" class="form-control" id="temperatura" placeholder="Temperatura" onkeypress="return numeros(event);">
                                  <span class="form-control-feedback right" aria-hidden="true">°C</span>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                  <input type="text" class="form-control" id="talla" placeholder="Talla" onkeypress="return numeros(event);">
                                  <span class="form-control-feedback right" aria-hidden="true">cm</span>
                                </div>
          
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                  <input type="text" class="form-control" id="peso" placeholder="Peso" onkeypress="return numeros(event);">
                                  <span class="form-control-feedback right" aria-hidden="true">kg</span>
                                </div>
                                </div>
                            </div>       
                                              
                          </div>
                          <!-- End SmartWizard Content -->
                          <!-- <button type="submit" class="btn btn-default" onclick="CrearTriaje()">Guardar</button> -->
                          
                        </div>
                        
                      </div>
                      
                    </div>
                    
                  </div>
                  
                </div>
                
              </div>

              <div class="modal fade bs-alergia-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                      </button>
                      <h4 class="modal-title" id="myModalLabel">Registar Nueva Alergia</h4>
                      <input Class="hidden" value="" id="modalAlergia" >
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Ingrese Alérgia</label>
                              <input type="text" class="form-control" placeholder="Ingresar Alérgia a Medicamentos" id="nomModalAlergia">
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                      <a type="button" class="btn btn-primary" onclick="guardarAlergia()" data-dismiss="modal">Guardar</a>
                    </div>

                  </div>
                </div>
            </div>
@endsection
@section('script')
<script src="{{ asset('../vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js')}}"></script>
<script src="{{ asset('../build/css/bootstrap-datetimepicker.css ')}}"></script>
<script>
  
  function guardarAlergia(){
    var nomalergia=$("#nomModalAlergia").val();
    //alert(nomalergia)
    $.post( "/alergia/store", {nomalergia: nomalergia, _token:'{{csrf_token()}}'}).done(function(data) {
      //console.log(data.codigo);
      $("#divAlergia").empty();
      $("#divAlergia").html(data.view);
            
    });
  }


function chekiarckes()
{
  $('.chekboxses:checked').each(
    function() {
     /*  var idCheckbox = $(this).val();
        alert("El checkbox con valor " + idCheckboxcks + " está seleccionado"); */
        console.log($(this).val());
      }
    );
}

  function CrearTriaje(){
    var fecRegla=$("#fecRegla").val();
    var cantGesta=$("#cantGesta").val();
    var p1=$("#p1").val();
    var p2=$("#p2").val();
    var p3=$("#p3").val();
    var p4=$("#p4").val();
    var fecNicolao=$("#fecNicolao").val();
    var metAntic=$("#metAntic").val();
    var detPatologia=$("#detPatologia").val();
    var idCita=$("#idCita").val();
    var presDiastolica = $("#presDiastolica").val();
    var presSistolica = $("#presSistolica").val();
    var pulso = $("#pulso").val();
    var temperatura = $("#temperatura").val();
    var talla = $("#talla").val();
    var peso = $("#peso").val();
    var num = $("#num").val();

   var idAlergias=[];


    $('.chekboxses:checked').each(
    function() {

        idAlergias.push($(this).val());
      }
    );

    $.post( "/triaje/store", {idAlergias:idAlergias, presDiastolica: presDiastolica, presSistolica: presSistolica, pulso: pulso, temperatura: temperatura, talla: talla, peso: peso, fecRegla:fecRegla, cantGesta: cantGesta, p1: p1, p2: p2, p3: p3, p4: p4, fecNicolao: fecNicolao, metAntic: metAntic, detPatologia: detPatologia, idCita: idCita, _token:'{{csrf_token()}}'}).done(function(data) {
      console.log(data.codigo);
         // alert(data.resultado);
          swal({
            title: "Triaje",
            text: "Se guardó exitosamente",
            type: "success",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Finalizar",
            closeOnConfirm: false
          },
          function(isConfirm){
            if (isConfirm) {            
              window.location="{{ Route('home') }}";
              {closeOnConfirm: true}
                        
            }
          });  
    });
  }
  
    function guardarTemporal(){
    var fecRegla=$("#fecRegla").val();
    var cantGesta=$("#cantGesta").val();
    var p1=$("#p1").val();
    var p2=$("#p2").val();
    var p3=$("#p3").val();
    var p4=$("#p4").val();
    var fecNicolao=$("#fecNicolao").val();
    var metAntic=$("#metAntic").val();
    var detPatologia=$("#detPatologia").val();
    var idCita=$("#idCita").val();
    var presDiastolica = $("#presDiastolica").val();
    var presSistolica = $("#presSistolica").val();
    var pulso = $("#pulso").val();
    var temperatura = $("#temperatura").val();
    var talla = $("#talla").val();
    var peso = $("#peso").val();
    var num = $("#num").val();

   var idAlergias=[];


    $('.chekboxses:checked').each(
    function() {

        idAlergias.push($(this).val());
      }
    );

    $.post('{{ route("triajeTemporal") }}', {idAlergias:idAlergias, presDiastolica: presDiastolica, presSistolica: presSistolica, pulso: pulso, temperatura: temperatura, talla: talla, peso: peso, fecRegla:fecRegla, cantGesta: cantGesta, p1: p1, p2: p2, p3: p3, p4: p4, fecNicolao: fecNicolao, metAntic: metAntic, detPatologia: detPatologia, idCita: idCita, _token:'{{csrf_token()}}'}).done(function(data) {
      
           
    });
  }
</script>

@endsection