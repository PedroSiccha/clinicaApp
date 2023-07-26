<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Receta Médica</title>
    <link rel="stylesheet" href="../public/build/css/style.css" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="logo.png">
      </div>
      <h1>{{ $receta[0]->Nombre }}</h1>
      <div id="company" class="clearfix">
        <div>Clinica</div>
        <div>Direccion,<br />Telefono</div>
        <div>anexo</div>
        <div><a href="mailto:company@example.com">clinica.com</a></div>
      </div>
      <div id="project">
        <div><span>DNI</span> {{ $receta[0]->DNI }}</div>
        <div><span>Edad</span> {{ $receta[0]->Edad }}</div>
        <div><span>Telefono</span> {{ $receta[0]->Telefono }}</div>
        <div><span>Género</span> {{ $receta[0]->Genero }}</div>
        <div><span>Fecha de la Consulta</span> {{ $receta[0]->FechaConsulta }}</div>
        <div><span>Hora de la Consulta</span> {{ $receta[0]->HoraConsulta }}</div>
        <div><span>Estado de la Consulta</span> {{ $receta[0]->EstadoConsulta }}</div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th>Medicamento</th>
            <th>Indicaciones</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($receta as $r)
            <tr>
                    <td>{{ $r->Medicamento }}</td>
                    <td>{{ $r->Indicacion }}</td>
                  </tr>      
            @endforeach
        </tbody>
      </table>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>