<table class="table table-hover">
    <thead>
        <tr>
        <th>Código</th>
        <th>Estado</th>
        <th>Administrar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($sed as $sed)
        <tr>
                <th scope="row">{{ $sed->id }}</th>
                <td>{{ $sed->nombre }}</td>
                <td>
                        <div class="btn-group">
                                <button class="btn btn-primary btn-xs" data-toggle="modal" data-target=".bs-editinstruccion-modal-lg"><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-danger btn-xs" data-toggle="modal" data-target=".bs-deleteinstruccion-modal-lg"><i class="fa fa-eraser"></i></button>         
                        </div>
                </td>
        </tr>      
        @endforeach
    </tbody>
</table>