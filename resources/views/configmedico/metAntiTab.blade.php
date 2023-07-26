<table class="table table-hover">
    <thead>
        <tr>
        <th>Código</th>
        <th>Método</th>
        <th>Administrar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($metodoanticonceptivo as $ma)
        <tr>
                <th>{{ $ma->id }}</th>
                <td>{{ $ma->nombre }}</td>
                <td>
                        <div class="btn-group">
                                <button class="btn btn-primary btn-xs" data-toggle="modal" data-target=".bs-editestadocivil-modal-lg"><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-danger btn-xs" data-toggle="modal" data-target=".bs-deleteestadocivil-modal-lg"><i class="fa fa-eraser"></i></button>         
                        </div>
                </td>
            </tr>      
        @endforeach
    </tbody>
</table>