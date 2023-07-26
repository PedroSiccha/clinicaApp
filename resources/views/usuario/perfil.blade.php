@extends('layouts.base')
@section('title')
 Registro de Empleados 
@endsection
@section('contenido')
<div class="" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Perfil de Usuario</h3>
        </div>
      </div>
      
      <div class="clearfix"></div>
    
      <div class="row"> 
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Reporte de Usuario <small>Actividades</small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                @foreach( $empleado as $emp )
                <div class="profile_img">
                  <div id="crop-avatar">
                    <!-- Current avatar -->
                    <img class="img-responsive avatar-view" src="images/picture.jpg" alt="Avatar" title="Change the avatar">
                  </div>
                </div>
                
                <h3>{{ $emp->nombre }} {{ $emp->apellido }}</h3>
                
                <ul class="list-unstyled user_data">
                  <li><i class="fa fa-map-marker user-profile-icon"></i> {{ $emp->direccion }}
                  </li>

                  <li>
                    <i class="fa fa-briefcase user-profile-icon"></i> {{ $emp->tipoempleado }}
                  </li>

                  <li class="m-top-xs">
                    <i class="fa fa-external-link user-profile-icon"></i>
                    <a href="http://www.kimlabs.com/profile/" target="_blank">{{ $emp->correo }}</a>
                  </li>
                </ul>

                <a class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Editar Perfil</a>
                <br />

                <!-- start skills -->
                <h4>Rendimiento</h4>
                <ul class="list-unstyled user_data">
                  <li>
                    <p>Citas</p>
                    <div class="progress progress_sm">
                      <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="{{ $cantCita[0]->cantCita }}"></div>
                    </div>
                  </li>
                  <li>
                    <p>Triajes</p>
                    <div class="progress progress_sm">
                      <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="{{ $cantTriaje[0]->cantTriaje }}"></div>
                    </div>
                  </li>
                  <li>
                    <p>Consultas</p>
                    <div class="progress progress_sm">
                      <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="{{ $cantConsulta[0]->cantConsulta }}"></div>
                    </div>
                  </li>
                </ul>
                <!-- end of skills -->
                @endforeach
              </div>
              <div class="col-md-9 col-sm-9 col-xs-12">

               
                <!-- start of user-activity-graph -->
                
                <!-- end of user-activity-graph -->

                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                  <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Citas Realisadas</a>
                    </li>
                    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Consultas</a>
                    </li>
                    <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Datos del Empleado</a>
                    </li>
                  </ul>
                  <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                      <!-- start recent activity -->
                      <ul class="messages">
                        @foreach( $citas as $ci )
                        <li>
                          <div class="message_date">
                            <h3 class="date text-info">Edad: {{ $ci->edad }}</h3>
                            <p class="month">{{ $ci->fecha }}</p>
                          </div>
                          <div class="message_wrapper">
                            <h4 class="heading">{{ $ci->nombre }} {{ $ci->apellido }}</h4>
                            <blockquote class="message">Motivo: {{ $ci->motivo }}.</blockquote>
                            <br />
                              <button type="button" class="btn btn-default btn-xs" onclick="detalleCita('{{ $ci->fecha }}','{{ $ci->motivo }}','{{ $ci->nombre }}','{{ $ci->apellido }}','{{ $ci->dni }}','{{ $ci->telefono }}','{{ $ci->direccion }}','{{ $ci->lugarnac }}','{{ $ci->lugarproc }}','{{ $ci->correo }}','{{ $ci->fecnac }}','{{ $ci->edad }}','{{ $ci->nomAco }}','{{ $ci->apeAco }}','{{ $ci->dniAco }}','{{ $ci->telAco }}','{{ $ci->correoAco }}','{{ $ci->dirAco }}','{{ $ci->fecNacAco }}','{{ $ci->edadAco }}')">Ver Más</button>
                          </div>
                        </li>
                        @endforeach
                      </ul>

                      <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="modalDetalleCita">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
        
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                    </button>
                                    <span id="modalFechaCita">RECUPERAR VARIBLE TITULO</span>
                                    
                                </div>
                                <div class="modal-body">
                                    <span id="modalPaciente">RECUPERAR VARIBLE TITULO</span>
                                    
                                    <address>
                                            <span id="modalDNI">RECUPERAR VARIBLE TITULO</span>
                                            <span id="modalTelefono">RECUPERAR VARIBLE TITULO</span>
                                            <span id="modalDireccion">RECUPERAR VARIBLE TITULO</span>
                                            <span id="modalLugarNac">RECUPERAR VARIBLE TITULO</span>
                                            <span id="modalLugarProc">RECUPERAR VARIBLE TITULO</span>
                                            <span id="modalCorreo">RECUPERAR VARIBLE TITULO</span>
                                            <span id="modalFecNac">RECUPERAR VARIBLE TITULO</span>
                                            <span id="modalEdad">RECUPERAR VARIBLE TITULO</span>
                                    </address>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
        
                                </div>
                            </div>
                        </div>
                      <!-- end recent activity -->

                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                      <!-- start user projects -->
                      <table class="data table table-striped no-margin">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Project Name</th>
                            <th>Client Company</th>
                            <th class="hidden-phone">Hours Spent</th>
                            <th>Contribution</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>New Company Takeover Review</td>
                            <td>Deveint Inc</td>
                            <td class="hidden-phone">18</td>
                            <td class="vertical-align-mid">
                              <div class="progress">
                                <div class="progress-bar progress-bar-success" data-transitiongoal="35"></div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>New Partner Contracts Consultanci</td>
                            <td>Deveint Inc</td>
                            <td class="hidden-phone">13</td>
                            <td class="vertical-align-mid">
                              <div class="progress">
                                <div class="progress-bar progress-bar-danger" data-transitiongoal="15"></div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td>Partners and Inverstors report</td>
                            <td>Deveint Inc</td>
                            <td class="hidden-phone">30</td>
                            <td class="vertical-align-mid">
                              <div class="progress">
                                <div class="progress-bar progress-bar-success" data-transitiongoal="45"></div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>4</td>
                            <td>New Company Takeover Review</td>
                            <td>Deveint Inc</td>
                            <td class="hidden-phone">28</td>
                            <td class="vertical-align-mid">
                              <div class="progress">
                                <div class="progress-bar progress-bar-success" data-transitiongoal="75"></div>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <!-- end user projects -->

                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                      <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui
                        photo booth letterpress, commodo enim craft beer mlkshk </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
  @section('script')
  <script src="../vendors/morris.js/morris.min.js"></script>
  <script src="../vendors/raphael/raphael.min.js"></script>
  <script>
      function detalleCita(fecha, motivo, nombre, apellido, dni, telefono, direccion, lugarnac, lugarproc, correo, fecnac, edad, nomAco, apeAco, dniAco, telAco, correoAco, dirAco, fecNacAco, edadAco){ 
        $('#modalDetalleCita').modal('show');
        document.getElementById("modalFechaCita").innerHTML="<h4 class='modal-title'> Detalles de Cita "+fecha+"</h4>";
        document.getElementById("modalPaciente").innerHTML="<h4>"+nombre+" "+apellido+"</h4>";
        document.getElementById("modalDNI").innerHTML="<strong> DNI: "+dni+"</strong>";
        document.getElementById("modalTelefono").innerHTML="<br> Telefono: "+telefono+"</h4>";
        document.getElementById("modalDireccion").innerHTML="<br> Direccion: "+direccion+"</h4>";
        document.getElementById("modalLugarNac").innerHTML="<br> Lugar de Naciemiento: "+lugarnac+"</h4>";
        document.getElementById("modalLugarProc").innerHTML="<br> Lugar de Procedencia: "+lugarproc+"</h4>";
        document.getElementById("modalCorreo").innerHTML="<br> Correo: "+correo+"</h4>";
        document.getElementById("modalFecNac").innerHTML="<br> Fecha de Nacimiento: "+fecnac+"</h4>";
        document.getElementById("modalEdad").innerHTML="<br> Edad: "+edad+"</h4>";
                                      
      }
  </script>
  @endsection