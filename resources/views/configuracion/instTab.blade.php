<table class="table table-hover">
    <thead>
        <tr>
        <th>Código</th>
        <th>Grado de Instrucción</th>
        <th>Administrar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($instruccion as $ins)
        <tr>
                <th scope="row">{{ $ins->id }}</th>
                <td>{{ $ins->nombre }}</td>
                <td>
                        <div class="btn-group">
                                <button class="btn btn-primary btn-xs" onclick="agregarInstruccion('{{$ins->id}}','{{$ins->nombre}}')"><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-danger btn-xs" onclick="eliminarInstruccion('{{$ins->id}}')"><i class="fa fa-eraser"></i></button>         
                        </div>
                </td>
        </tr>      
        @endforeach
    </tbody>
</table>