<table class="table table-hover">
    <thead>
        <tr>
        <th>Código</th>
        <th>Género</th>
        <th>Administrar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($genero as $gen)
        <tr>
                <th>{{ $gen->id }}</th>
                <td>{{ $gen->nombre }}</td>
                <td> 
                <div class="btn-group">
                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target=".bs-editgenero-modal-lg" onclick="agregarGenero('{{$gen->id}}','{{$gen->nombre}}')"><i class="fa fa-pencil"></i></button>
                    <button class="btn btn-danger btn-xs" onclick="eliminarGenero('{{$gen->id}}')"><i class="fa fa-eraser"></i></button>         
                </div>
                </td>
            </tr>
            
            
            
        @endforeach
    </tbody>
</table>