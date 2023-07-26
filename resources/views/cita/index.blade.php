@extends('layouts.base')
@section('title')
 Citas   
@endsection
@section('contenido')

<div class="container">
  <div class="row">
    <div class="col"></div>
    <div class="col-md-12"><div id="CalendarioWeb"></div></div>
    <div class="col"></div>
  </div>
</div>

<script>
  //Script para modificar el calendario
  $(document).ready(function(){
    //Asigna botones al calendario
    $('#CalendarioWeb').fullCalendar({
      header:{
        left:'today,prev,next',
        center:'title',
        right:'month,basicWeek,basicDay,agendaWeek,agendaDay'
      },
      //Da la funcion para hacer click en el calendario
      dayClick:function(date,jsEvent,view){
        alert(date.format());//Captura la fecha y la muestra en un alert
        //$(this).css('background-color','red');

        $("#CalenderModalNew").modal();//Muestra el modal
      },
      
      events:[
        {
          //Asigna eventos por fechas
          title:'Evento 1',
          start:'2019-06-13'
        },
        {
          //colorea los dias
      start: '2019-06-01',
      end: '2019-06-10',
      rendering: 'background'
    }
      ],
      eventClick:function(calEvent,jsEvent,view,date){
        $('#FechaCita').html(calEvent.title);
        $("#CalenderModalNew").modal();
      }
    });
  });
</script>


      <!-- /page content -->

      <!-- calendar modal -->
    <div id="CalenderModalNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
      
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h4 class="modal-title" id="myModalLabel">Nueva Cita</h4>
                </div>
                <div class="modal-body">

                   
                    <form id="feedback_form" class="form-horizontal form-label-left calender" method="POST" action="/cita">
                      {!! csrf_field() !!}
                  <div id="testmodal" style="padding: 5px 20px;">
                    
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Especialidad</label>
                        <div class="col-sm-9">
                                <div class="row">
                                  <div class="col-sm-9" >                 
                                        <?php 
                                        echo "<select class='form-control' id='descr' name='descr'>";
                                        foreach ($areas as $clave=>$area){
                                            echo "<option >$area->nombre</option>";
                                        }
                                        echo "</select>";               
                                          ?>
                                  </div>
                                </div>
                              </div>    
                              
                         <!-- <div class="col-sm-9">
                          <input type="text" class="form-control" id="title" name="area">
                        </div> 
                      </div> -->
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Paciente</label>
                        <div class="col-sm-9">

                                <div class="row">
                                  <div class="col-sm-9">
        
                                        <?php 
                                        echo "<select class='form-control' id='title' name='title'>";
                                        foreach ($pacientes as $clave=>$pac){
                                            echo "<option>$pac->nombre</option>";
                                        }
                                        echo "</select>";               
                                          ?>
                                  </div>
                                </div>
                                
                              </div>
                              
                      </div>
                      <div class="modal-body">
                         <div id="FechaCita"></div>
                      </div>  
                  </div>
                </form>
                </div>
                <div class="modal-footer">
                   <a  class="col-sm-1" data-toggle="modal" data-target=".bs-especialidad-modal-sm"><i class="fa fa-plus-square"></i> </a>
                   <a class="col-sm-1" href="persona/create"><i class="fa fa-user"></i></a>
                  <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-primary antosubmit">Crear</button>
                </div>
              </div>

              

            </div>
            <!-- Modal Especialidad -->
            <div class="modal fade bs-especialidad-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
        
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Registrar Nueva Especialidad</h4>
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
                              <label class="control-label col-md-3 col-sm-3 col-xs-12 ">Tipo de Área </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control" placeholder="Especialidad o Administrativo" name="descripcion">
                              </div>
                            </div>
              
                            <div class="ln_solid"></div>
                            <div class="form-group">
                              <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                
                                  <button type="submit" class="btn btn-success">Guardar</button>
                                  <button type="button" class="btn btn-primary">Cancelar</button>
                                
                              </div>
                            </div>
              
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
            <!-- Fin Modal Especialidad -->      

            

          </div>
          <div id="CalenderModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
      
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h4 class="modal-title" id="myModalLabel2">Editar Cita</h4>
                </div>
                <div class="modal-body">
      
                  <div id="testmodal2" style="padding: 5px 20px;">
                    <form id="antoform2" class="form-horizontal calender" role="form">
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Especialidad</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="title2" name="title2">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Paciente</label>
                        <div class="col-sm-9">
                          <textarea class="form-control" style="height:55px;" id="descr2" name="descr"></textarea>
                        </div>
                      </div>
      
                    </form>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default antoclose2" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary antosubmit2">Guardar Cambios</button>
                </div>
              </div>
            </div>
          </div>
      
          <div id="fc_create" data-toggle="modal" data-target="#CalenderModalNew"></div>
          <div id="fc_edit" data-toggle="modal" data-target="#CalenderModalEdit"></div>
          <!-- /calendar modal -->


@endsection