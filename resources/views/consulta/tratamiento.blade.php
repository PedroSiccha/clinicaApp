<table class="table table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Codigo</th>
            <th>Descripción</th>
            <th>Administración</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($recetaMedica as $med)
            <tr>
              <th scope="row">{{ $med->Numeracion }}</th>
              <td>{{ $med->medicamento }}</td>
              <td>{{ $med->indicacion }}</td>
              <td><button type="button" class="btn btn-sm btn-danger" onclick="eliminarTratamiento({{ $med->tratamientos_id }})" data-placement="top" data-toggle="tooltip" data-original-title="Eliminar {{$med->medicamento}}"><i class="fa fa-check"></i></button></td>
            </tr>    
          @endforeach
        </tbody>
</table>