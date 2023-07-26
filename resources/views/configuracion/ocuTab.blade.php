<table class="table table-hover">
    <thead>
        <tr>
        <th>Código</th>
        <th>Ocupación</th>
        <th>Administrar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ocupacion as $ocu)
        <tr>
                <th scope="row">{{ $ocu->id }}</th>
                <td>{{ $ocu->nombre }}</td>
                <td>
                        <div class="btn-group">
                                <button class="btn btn-primary btn-xs" onclick="agregarOcupacion('{{$ocu->id}}','{{$ocu->nombre}}')"><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-danger btn-xs" onclick="eliminarOcupacion('{{$ocu->id}}')"><i class="fa fa-eraser"></i></button>         
                        </div>
                </td>
        </tr>      
        @endforeach
    </tbody>
</table>