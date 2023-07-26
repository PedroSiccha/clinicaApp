<table class="table table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Detalle de la Observacion</th>
            <th>Administrar</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($observacion as $obs) 
          <tr>
              <th scope="row">{{ $obs->Numeracion }}</th>
              <td>{{ $obs->nombre }}</td>
              <td><button type="button" class="btn btn-sm btn-danger" onclick="eliminarObservacion({{ $obs->id }})" data-placement="top" data-toggle="tooltip" data-original-title="Eliminar Observacion"><i class="fa fa-check"></i></button></td>
            </tr>                                          
          @endforeach

        </tbody>
</table>