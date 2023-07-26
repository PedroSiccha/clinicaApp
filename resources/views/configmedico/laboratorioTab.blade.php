<table class="table table-hover">
    <thead>
        <tr>
        <th>Código</th>
        <th>Nombre</th>
        <th>RUC</th>
        <th>Telefono</th>
        <th>Direccion</th>
        <th>Administrar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($laboratorio as $lab)
        <tr>
                <th scope="row">{{ $lab->id }}</th>
                <td>{{ $lab->nombre }}</td>
                <td>{{ $lab->ruc }}</td>
                <td>{{ $lab->telefono }}</td>
                <td>{{ $lab->direccion }}</td>
                <td>
                        <div class="btn-group">
                                <button class="btn btn-primary btn-xs" data-toggle="modal" data-target=".bs-editocupacion-modal-lg"><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-danger btn-xs" data-toggle="modal" data-target=".bs-deleteocupacion-modal-lg"><i class="fa fa-eraser"></i></button>         
                        </div>
                </td>
        </tr>      
        @endforeach
    </tbody>
</table>