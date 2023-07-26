<table class="table table-hover">
    <thead>
        <tr>
        <th>Código</th>
        <th>Descripcion</th>
        <th>Tipo</th>
        <th>Administrar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cie as $c)
        <tr>
                <th scope="row">{{ $c->codigo }}</th>
                <td>{{ $c->descripcion }}</td>
                <td>{{ $c->tipo }}</td>
                <td>
                        <div class="btn-group">
                                <button class="btn btn-primary btn-xs" onclick="cargarCie('{{ $c->id }}','{{ $c->codigo }}','{{ $c->descripcion }}','{{ $c->tipo }}')"><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-danger btn-xs" onclick="eliminarCie('{{$c->id}}')"><i class="fa fa-eraser"></i></button>         
                        </div>
                </td>
        </tr>      
        @endforeach
    </tbody>
</table>