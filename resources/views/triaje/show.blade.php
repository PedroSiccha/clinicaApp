@extends('layouts.base')
@section('title')
 Lista Total de Triaje
@endsection
@section('contenido')
<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Lista de Triajes</h2>
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
                  <th>Nombres</th>
                  <th>DNI</th>
                  <th>Telefono</th>
                  <th>Dirección</th>
                  <th>Fecha y hora de Atencón</th>
                  <th>Realizado Por:</th>
                  <th>Estado</th>
                  <th>Administrador</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($triaje as $tri)
                  <tr>
                        <th>{{ $tri->idTriaje }}</th>
                        <td>{{ $tri->nombre }}</td>
                        <td>{{ $tri->dni }}</td>
                        <td>{{ $tri->telefono }}</td>
                        <td>{{ $tri->direccion }}</td>
                        <td>{{ $tri->creacion }}</td>
                        <td>{{ $tri->usuario }}</td>
                        <td>{{ $tri->estado }}</td>
                        <td>
                                <div class="btn-group">
                                    <button class="btn btn-primary btn-xs " data-toggle="modal" data-target=".bs-edittriaje-modal-lg" onclick="agregarCita('{{$tri->idTriaje}}', '{{$tri->nombre}}', '{{$tri->dni}}', '{{$tri->telefono}}')"><i class="fa fa-pencil"></i></button>
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
      

            <!-- MODAL Editar Triaje -->
<div class="modal fade bs-edittriaje-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <form class="form-horizontal form-label-left" id="feedback_form" method="POST" action="/triaje/guardar">
        {!! csrf_field() !!}
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Cambiar Cita</h4>
          <input type="txt" class="form-control hidden" id="idCitas" name="idCitas">
        </div>
        
        <div class="" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
              <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Funciones Biológicas</a>
              </li>
              <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Funciones Vitales</a>
              </li>
              <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Antecedentes Personales</a>
              </li>
              <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Inspecciones Generales</a>
              </li>
            </ul>
            <div id="myTabContent" class="tab-content">
              <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label class="control-label col-md-5 col-sm-5 col-xs-12">Estado de Apetito</label>
                      <select class="form-control col-md-9 col-sm-9 col-xs-12" name="apetito">
                              @foreach ($apetito as $ape)
                              <option value="{{ $ape->id }}">{{ $ape->nombre }}</option>
                              @endforeach
                      </select>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <label class="control-label col-md-5 col-sm-5 col-xs-12">Estado de Deposiciones</label>
                    <select class="form-control col-md-9 col-sm-9 col-xs-12" name="deposicion">
                            @foreach ($deposicion as $dep)
                            <option value="{{ $dep->id }}">{{ $dep->nombre }}</option>
                            @endforeach
                    </select>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <label class="control-label col-md-5 col-sm-5 col-xs-12">Estado de Sed</label>
                    <select class="form-control col-md-9 col-sm-9 col-xs-12" name="sed">
                            @foreach ($sed as $sed)
                            <option value="{{ $sed->id }}">{{ $sed->nombre }}</option>
                            @endforeach
                    </select>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <label class="control-label col-md-5 col-sm-5 col-xs-12">Estado de Sueño</label>
                    <select class="form-control col-md-9 col-sm-9 col-xs-12" name="sueño">
                            @foreach ($sueño as $su)
                            <option value="{{ $su->id }}">{{ $su->nombre }}</option>
                            @endforeach
                    </select>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                    <label class="control-label col-md-5 col-sm-5 col-xs-12">Estado de Orina</label>
                    <select class="form-control col-md-9 col-sm-9 col-xs-12" name="orina">
                            @foreach ($orina as $ori)
                            <option value="{{ $ori->id }}">{{ $ori->nombre }}</option>
                            @endforeach
                    </select>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <label class="control-label col-md-5 col-sm-5 col-xs-12">Presión Arterial</label>
                    <select class="form-control col-md-9 col-sm-9 col-xs-12" name="presarterialsis">
                            @foreach ($presarterial as $part)
                            <option value="{{ $part->id }}">{{ $part->sistolica }}</option>
                            @endforeach
                    </select>
                    <select class="form-control col-md-9 col-sm-9 col-xs-12" name="presarterialdia">
                            @foreach ($presarterial as $part)
                            <option value="{{ $part->id }}">{{ $part->diastolica }}</option>
                            @endforeach
                    </select>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label class="control-label col-md-5 col-sm-5 col-xs-12">Fecha de Ultima Regla</label>
                      <input type="date" class="form-control has-feedback-left" id="inputSuccess2" name="fecultimregla">
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label class="control-label col-md-5 col-sm-5 col-xs-12">Cantidad de Gestaciones</label>
                      <select class="form-control" name="cangestaciones">
                              <option value="0">0 Gestación</option>
                              <option value="1">1 Gestación</option>
                              <option value="2">2 Gestaciones</option>
                              <option value="3">3 Gestaciones</option>
                              <option value="4">4 Gestaciones</option>
                              <option value="5">5 Gestaciones</option>
                              <option value="6">6 Gestaciones</option>
                              <option value="7">7 Gestaciones</option>
                              <option value="8">8 Gestaciones</option>
                              <option value="9">9 Gestaciones</option>
                              <option value="10">10 Gestaciones</option>
                              <option value="11">11 Gestaciones</option>
                              <option value="12">12 Gestaciones</option>
                              <option value="13">13 Gestaciones</option>
                              <option value="14">14 Gestaciones</option>
                              <option value="15">15 Gestaciones</option>
                              <option value="16">16 Gestaciones</option>
                              <option value="17">17 Gestaciones</option>
                              <option value="18">18 Gestaciones</option>
                              <option value="19">19 Gestaciones</option>
                              <option value="20">20 Gestaciones</option>
                      </select>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label class="control-label col-md-5 col-sm-5 col-xs-12">Último Papá Nicolao</label>
                      <input type="date" class="form-control has-feedback-left" id="inputSuccess4" name="paoanicolao">
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label class="control-label col-md-5 col-sm-5 col-xs-12">Método Anticonceptivo</label>
                      <select class="form-control col-md-9 col-sm-9 col-xs-12" name="metodoantic">
                              @foreach ($metodo as $me)
                              <option value="{{ $me->id }}">{{ $me->nombre }}</option>
                              @endforeach
                          </select>
                  </div>
              </div>
              <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label class="control-label col-md-5 col-sm-5 col-xs-12">Cabeza</label>
                      <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Estado de Cabeza" name="cabeza">
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label class="control-label col-md-5 col-sm-5 col-xs-12">Cuello</label>
                      <input type="text" class="form-control" id="inputSuccess3" placeholder="Estado de Cuello" name="cuello">
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label class="control-label col-md-5 col-sm-5 col-xs-12">Torax</label>
                      <input type="text" class="form-control has-feedback-left" id="inputSuccess4" placeholder="Estado de Torax" name="torax">
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label class="control-label col-md-5 col-sm-5 col-xs-12">Mamas</label>
                      <input type="text" class="form-control" id="inputSuccess5" placeholder="Estado de Mamas" name="mamas">
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label class="control-label col-md-5 col-sm-5 col-xs-12">Pulmones</label>
                      <input type="text" class="form-control has-feedback-left" id="inputSuccess4" placeholder="Estado de Pulmones" name="pulmonesycardio">
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label class="control-label col-md-5 col-sm-5 col-xs-12">Abdomen</label>
                      <input type="text" class="form-control" id="inputSuccess5" placeholder="Estado de Abdomen" name="abdomen">
                  </div>
              </div>
            </div>
          </div>
        
        <div class="modal-footer">
            <button type="submit" class="btn btn-success btn-sm"> <i class="fa fa-user">
              </i> Actualizar </button>
            <button type="button" class="btn btn-primary btn-sm">
              <i class="fa fa-user"> </i> Cancelar
            </button>
        </div>
      </div>
    </div>
</form>
</div>

@endsection