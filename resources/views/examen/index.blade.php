@extends('layouts.base')
@section('title')
 Pagar Cita    
@endsection

@section('contenido')
<div class="x_panel">
    <div class="col-md-6 col-sm-12 col-xs-12 profile_details">
      <div class="well profile_view col-md-12 col-sm-12 col-xs-12">
        <div class="col-sm-12">
          <div class="left col-xs-7">
            <h2>{{ $paciente[0]->nombre }}</h2>
            <ul class="list-unstyled">
              <li><i class="fa fa-building"></i> DNI: {{ $paciente[0]->dni }}</li>
              <br>
            </ul>
          </div> 
        </div>
          <div class="col-xs-12 bottom text-center">
          Paciente
          </div>
      </div>
    </div>
    <div class="col-md-6 col-sm-12 col-xs-12 profile_details">
      <div class="well profile_view col-md-12 col-sm-12 col-xs-12">
        <div class="col-sm-12">
          <div class="left col-xs-7">
            <h2>{{ $acompanate[0]->nombre }}</h2>
            <ul class="list-unstyled">
              <li><i class="fa fa-building"></i> DNI: {{ $acompanate[0]->dni }}</li>
              <li><i class="fa fa-phone"></i> Parentezco: {{ $acompanate[0]->parentezco }}</li>
            </ul>
          </div>
        </div>
          <div class="col-xs-12 bottom text-center">
            Acompañante
          </div>
      </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12 profile_details">
        <div class="well profile_view col-md-12 col-sm-12 col-xs-12">
            <div class="col-xs-12 bottom text-center">
                TRIAJE
            </div>
          <div class="col-sm-12">
            <div class="left col-xs-6">
                <div class="x_panel">
                    <h4>Personales</h4>
                    <div class="x_content">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>FUR</th>
                            <th>G</th>
                            <th>P-1</th>
                            <th>p-2</th>
                            <th>P-3</th>
                            <th>p-4</th>
                            <th>PAP</th>
                            <th>MAC</th>
                          </tr>
                        </thead>
                        <tbody>
                            <tr>
                                  <td>{{ $historiaClinica[0]->FecUltimaRegla }}</td>
                                  <td>{{ $historiaClinica[0]->CanGestaciones }}</td>
                                  <td>{{ $historiaClinica[0]->ValorA }}</td>
                                  <td>{{ $historiaClinica[0]->ValorB }}</td>
                                  <td>{{ $historiaClinica[0]->ValorC }}</td>
                                  <td>{{ $historiaClinica[0]->ValorD }}</td>
                                  <td>{{ $historiaClinica[0]->FecPapaNicolao }}</td>
                                  <td>{{ $historiaClinica[0]->MetodoAnticonceptivo }}</td>
                             </tr>      
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
            </div>
            <div class="right col-xs-6">
            <div class="x_panel">
                <h4>Patológicos</h4>
                <div class="x_content">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Antecedente</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr>
                              <td>{{ $historiaClinica[0]->Detalle }}</td>
                         </tr>      
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <div class="left col-xs-6">
                <div class="x_panel">
                    <h4>Alergias Médicas</h4>
                    <div class="x_content">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>Alergia</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach( $alergias as $a )
                            <tr>
                              <td>{{ $a->alergia }}</td>
                             </tr>      
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
            </div>
            <div class="right col-xs-6">
            <div class="x_panel">
                <h4>Exámen Clinico</h4>
                <div class="x_content">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Presion Arterial</th>
                        <th>Pulso</th>
                        <th>Temperatura</th>
                        <th>Talla</th>
                        <th>Peso</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr>
                              <td>{{ $historiaClinica[0]->sistolica }}/{{ $historiaClinica[0]->diastolica }}</td>
                              <td>{{ $historiaClinica[0]->pulso }}</td>
                              <td>{{ $historiaClinica[0]->temperatura }}</td>
                              <td>{{ $historiaClinica[0]->talla }}</td>
                              <td>{{ $historiaClinica[0]->peso }}</td>
                         </tr>      
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
            
        </div>
      </div>

      <div class="col-md-12 col-sm-12 col-xs-12 profile_details">
          <div class="well profile_view col-md-12 col-sm-12 col-xs-12">
              <div class="col-xs-12 bottom text-center">
                  {{ $cita[0]->nombre }}
              </div>
            <div class="col-sm-12">
                <form class="form-horizontal form-label-left formExamen" id="fExamen" name="fExamen" method="post" action="subirExamen" enctype="multipart/form-data">
                  {!! csrf_field() !!}
                  <input type="text" name="idpaciente" hidden value="{{ $tipoExamen[0]->idPacientes }}">
                  <input type="text" name="idCitas" hidden value="{{ $tipoExamen[0]->idCitas }}">
                  <input type="text" name="idcitamotivo" hidden value="{{ $cita[0]->id }}">
                  <br>
                  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre de Documento <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="nomExam" name="nomExam" required="required" class="form-control">
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Descripcion <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea class="form-control" rows="3" placeholder="Ingrese una breve descripcion de su exámen" name="textResultado"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Documento <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="file" id="documento" required="required" class="col-md-7 col-xs-12" name="documento">
                    </div>
                  </div>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-primary">Guardar</button>
              </form>
            </div>
          </div>
        </div>
  
</div>
@endsection

@section('script')

 
<script>

function salir(){
    window.location="{{ route('home') }}";
}

function guardarExamen(){
  var resultado = $('#resultado').val();
  var documento = $('#documento').val();
  var idLab = $('#LabSelect').val();
  var motivo = $('#motivo').val();
/*  var parametro = new FormData($('#formOrdenExam')[0]);
  alert(parametro);
*/
  $.post('{{ route("subirExamenAuxiliar") }}', {resultado: resultado, documento: documento, motivo: motivo, idLab: idLab, _token: '{{ csrf_token() }}'}).done(function(data){
    //alert(data.resul);
    window.location="{{ route('home') }}";
  });
}

$(document).on("submit", ".formExamen", function(e){
  e.preventDefault();
  var formu = $(this);
  var nombreform = $(this).attr("id");
  if (nombreform == "fExamen") {
    var miurl = "{{ route('subirExamenAuxiliar') }}";
    var divresul = "notificaciones";
  }
  var formData = new FormData($("#"+nombreform+"")[0]);
  $.ajax({ url: miurl, type: 'POST', data: formData, cache: false, contentType: false, processData: false,
          beforeSend: function() {
            alert("Realizando Peticion");
            $("#"+divresul+"").html($("cargador_empresa").html());
          },
          success: function(data) {
            alert("Todo Bien");
            $("#"+divresul+"").html(data);
            window.location="{{ route('home') }}";
          },
          error: function(data) {
            alert("Algo salió mal");
          }
  });
});

</script>

@endsection

