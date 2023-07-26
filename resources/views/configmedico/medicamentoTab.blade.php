<table class="table table-hover">
    <thead>
      <tr>
        <th>Código</th>
        <th>Nombre</th>
        <th>Concentración</th>
        <th>Presentación</th>
        <th>Administrar</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($medicamentos as $med)
        <tr>
              <th scope="row">{{ $med->id }}</th>
              <td>{{ $med->nombre }}</td>
              <td>{{ $med->concentracion }}</td>
              <td>{{ $med->presentacion }}</td>
              <td>
                      <div class="btn-group">
                              <button class="btn btn-primary btn-xs" onclick="cargarMedicamento('{{ $med->id }}','{{ $med->nombre }}','{{ $med->concentracion }}','{{ $med->presentacion }}')"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-danger btn-xs" onclick="eliminarMedicamento('{{$med->id}}')"><i class="fa fa-eraser"></i></button>         
                      </div>
              </td>
        </tr>      
        @endforeach
    </tbody>
  </table>