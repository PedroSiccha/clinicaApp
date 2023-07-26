 <table class="table table-hover">
  <thead>
    <tr>
      <th>Fecha de Exámen</th>
      <th>Médico</th>
      <th>Estado</th>
      
      <th>Administrar</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($ordenExamen as $oe)
      <tr>
        <td>{{ $oe->fechaOrden }}</td>
        <td>{{ $oe->medico }}</td>
        <td <?php if( $oe->estorden == "PENDIENTE"){ $estadoOrd = "label-danger"; }else{ $estadoOrd = "label-success"; } ?>><span class="label {{$estadoOrd}}">{{ $oe->estorden }}</span></td>
       
        <td>
            <div class="btn-group">
              <button class="btn btn-default btn-xs" type="button" onclick="subirOrden('{{ $oe->orden_id }}')"><i class="fa fa-upload"></i></button>
              <button class="btn btn-primary btn-xs" type="button" onclick="detalleOrden()"><i class="fa fa-external-link"></i></button>
              <button class="btn btn-danger btn-xs" type="button"><i class="fa fa-eraser"></i></button>
            </div>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>