<table class="table table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>Tipo de Exámen</th>
        <th>Estado</th>
        <th>Archivo</th>
        <th>Gestión</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($exaPendientes as $ep)
      <tr>
          <th scope="row">1</th>
          <td>{{ $ep->nombre }}</td>
          <td <?php if( $ep->estado == "PENDIENTE"){ $estado = "label-danger"; }else{ $estado = "label-success"; } ?>><span class="label {{$estado}}">{{ $ep->estado }}</span></td>
          <td>
            <a class="btn btn-app">
              <i class="fa fa-save"></i> Ver
            </a>
          </td>
          <td>
            <div class="btn-group">
              <button class="btn btn-default btn-xs" type="button" onclick="subirExaAux('{{ $ep->id }}')"><i class="fa fa-upload"></i></button>
              <button class="btn btn-primary btn-xs" type="button" onclick="detalleExaAux()"><i class="fa fa-external-link"></i></button>
              <button class="btn btn-danger btn-xs" type="button"><i class="fa fa-eraser"></i></button>
            </div>
          </td>
        </tr>    
      @endforeach
    </tbody>
  </table>