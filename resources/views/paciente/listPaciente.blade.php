<table class="table table-hover">
        <thead>
          <tr>
            <th>Código</th>
            <th>Nombres</th>
            <th>DNI</th>
            <th>Telefono</th>
            <th>Dirección</th>
            <th class="hidden">Lugar de Nacimiento</th>
            <th class="hidden">Lugar de Procedencia</th>
            <th>Correo</th>
            <th class="hidden">Fecha de Nacimiento</th>
            <th>Edad</th>
            <th>Ocupación</th>
            <th>Grado de Instrucción</th>
            <th>Estado Civil</th>
            <th class="hidden">Genero</th>
            <th>Administrador</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($paciente as $pac)
            <tr>
                  <th>{{ $pac->id }}</th>
                  <td>{{ $pac->nombre }}</td>
                  <td>{{ $pac->dni }}</td>
                  <td>{{ $pac->telefono }}</td>
                  <td>{{ $pac->direccion }}</td>
                  <td class="hidden">{{ $pac->lugarnac }}</td>
                  <td class="hidden">{{ $pac->lugarproc }}</td>
                  <td>{{ $pac->correo }}</td>
                  <td class="hidden">{{ $pac->fecnac }}</td>
                  <td>{{ $pac->edad }}</td>
                  <td>{{ $pac->ocupacion }}</td>
                  <td>{{ $pac->instruccion }}</td>
                  <td>{{ $pac->estadocivil }}</td>
                  <td class="hidden">{{ $pac->genero }}</td>
                  <td>
                          <div class="btn-group">
                                  <button class="btn btn-primary btn-xs" onclick="CargarPaciente('{{ $pac->nom }}', '{{ $pac->ape }}', '{{ $pac->fecnac }}', '{{ $pac->dni }}', '{{ $pac->direccion }}', '{{ $pac->telefono }}', '{{ $pac->lugarnac }}', '{{ $pac->lugarproc }}', '{{ $pac->correo }}', '{{ $pac->ocupacion }}', '{{ $pac->instruccion }}', '{{ $pac->estadocivil }}', '{{ $pac->genero }}', '{{ $pac->id }}')" ><i class="fa fa-pencil"></i></button>
                                  <button class="btn btn-danger btn-xs" data-toggle="modal" data-target=".bs-deletegenero-modal-lg"><i class="fa fa-eraser"></i></button>
                                  <a class="btn btn-dark btn-xs" href="{{ route('perfilUsuario',[$pac->id]) }}"><i class="fa fa-user"></i></a>         
                          </div>
                  </td>
                </tr>
                
                
                
            @endforeach
        </tbody>
      </table>