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
          @foreach ($diagnostico as $dia)
            <tr>
              <th scope="row">{{ $dia->Numeracion }}</th>
              <td>{{ $dia->Codigo }}</td>
              <td>{{ $dia->Descripcion }}</td>
              <td><button type="button" class="btn btn-sm btn-danger" onclick="eliminarDiagnostico('{{ $dia->idCieConsulta }}');" data-placement="top" data-toggle="tooltip" data-original-title="Eliminar {{$dia->Codigo}}"><i class="fa fa-check"></i></button></td>
            </tr>    
          @endforeach
        </tbody>
      </table>
      
      