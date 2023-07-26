<table class="table table-hover">
  <thead>
    <tr>
      <th>#</th>
      <th>Nombre</th>
      <th>Descripcion</th>
      <th>Administrar</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($resultadoAux as $ra)
      <tr>
        <th scope="row">{{ $ra->id }}</th>
        <td>{{ $ra->nombre }}</td>
        <td>{{ $ra->detalle }}</td>
        <td>
          <div class="btn-group">
             <!-- <button type="button" class="btn btn-xs btn-default" onclick="eliminarObservacion()" data-placement="top" data-toggle="tooltip" data-original-title="Ver Archivo"><i class="fa fa-file-archive-o"></i></button> -->
              <a type="button" href="{{ route('downloadExamenAuxiliar', " $ra->id " ) }}" class="btn btn-xs btn-primary" hr data-placement="top" data-toggle="tooltip" data-original-title="Descargar Archivo {{ $ra->id }}"><i class="fa fa-download"></i></a>
              <button type="button" class="btn btn-xs btn-danger" onclick="eliminarObservacion()" data-placement="top" data-toggle="tooltip" data-original-title="Eliminar Archivo"><i class="fa fa-eraser"></i></button>
          </div>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>