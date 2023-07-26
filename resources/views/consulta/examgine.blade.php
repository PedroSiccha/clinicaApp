<table class="table table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>Exámenes</th>
        <th>Resultado</th>
        <th>Documento</th>
        <th>Administración</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($exaGinecologico as $eG)
        <tr>
          <th scope="row">{{ $eG->Numeracion }}</th>
          <td>{{ $eG->NomExamen }}</td>
          <td>{{ $eG->ResultadoExa }}</td>
          <td>
            <a class="btn"  id="pictureBtn"><i class="glyphicon glyphicon-eye-open"></i></a>
            <a class="btn"  id="pictureBtn"><i class="glyphicon glyphicon-print"></i></a></td>
          <td><a class="btn"  id="pictureBtn"><i class="glyphicon glyphicon-remove"></i></a></td>
        </tr>    
      @endforeach
    </tbody>
</table>