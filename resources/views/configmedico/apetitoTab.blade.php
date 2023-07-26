<table class="table table-hover">
    <thead>
        <tr>
        <th>Código</th>
        <th>Estado</th>
        <th>Administrar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($apetito as $ape)
        <tr>
                <th scope="row">{{ $ape->id }}</th>
                <td>{{ $ape->nombre }}</td>
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