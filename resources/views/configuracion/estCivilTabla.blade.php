<table class="table table-hover">
    <thead>
        <tr>
        <th>Código</th>
        <th>Estado Civil</th>
        <th>Administrar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($estadocivil as $ec)
        <tr>
                <th>{{ $ec->id }}</th>
                <td>{{ $ec->nombre }}</td>
                <td>
                        <div class="btn-group">
                                <button class="btn btn-primary btn-xs" onclick="agregarEstadoCivil('{{$ec->id}}','{{$ec->nombre}}')"><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-danger btn-xs" onclick="eliminarEstadoCivil('{{$ec->id}}')"><i class="fa fa-eraser"></i></button>         
                        </div>
                </td>
            </tr>      
        @endforeach
    </tbody>
</table>