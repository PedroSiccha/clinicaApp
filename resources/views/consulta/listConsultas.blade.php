<table class="table table-hover">
    <thead>
    <tr>
        <th>Fecha de Consulta</th> 
        <th>Hora de Consulta</th>
        <th>Paciente</th>
        <th>Numero de DNI</th>
        <th>Edad</th>
        <th>Estado de la Consulta</th>
        <th>Motivo de la Consulta</th>
        <th>Administración</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($consultas as $co)
        <tr>
            <td>{{ $co->FechaConsulta }}</td>
            <td>{{ $co->HoraConsulta }}</td>
            <td>{{ $co->NombrePaciente }}</td>
            <td>{{ $co->DNI }}</td>
            <td>{{ $co->Edad }}</td>
            <td>{{ $co->EstadoCita }}</td>
            <td>{{ $co->MotivoCita }}</td>
            <td><a href="{{ Route('consultaDetalle', [$co->citas_id]) }}"><button type="button" class="btn btn-dark"><i class="fa fa-eye"></i></button></a></td>
        </tr>
        @endforeach
    </tbody>
</table>