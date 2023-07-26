<table class="table table-hover">
    <thead>
        <tr>
        <th>Código</th>
        <th>Alérgia</th>
        <th>Administrar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($alergia as $ale)
        <tr>
                <th>{{ $ale->id }}</th>
                <td>{{ $ale->nombre }}</td>
                <td>
                        <div class="btn-group">
                                <button class="btn btn-primary btn-xs" onclick="cargarAlergia('{{$ale->id}}','{{$ale->nombre}}')"><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-danger btn-xs" data-toggle="modal" data-target=".bs-deletegenero-modal-lg"><i class="fa fa-eraser"></i></button>         
                        </div>
                </td>
            </tr>
            
            
            
        @endforeach
    </tbody>
</table>