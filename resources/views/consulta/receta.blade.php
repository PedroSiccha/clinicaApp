<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Consultas</title>
    <link rel="stylesheet" href="../public/build/css/style.css"/>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="logo.png">
      </div>
      <h1>Receta Médica</h1>
      <div id="company" class="clearfix">
        <div>Clinica</div>
        <div>Direccion,<br />Telefono</div>
        <div>anexo</div>
        <div><a href="mailto:company@example.com">clinica.com</a></div>
      </div>
      <div id="project">
        <div><span>PACIENTE</span> {{ $paciente[0]->nombre }}</div>
        <div><span>DNI</span> {{ $paciente[0]->dni }}</div>
        <div><span>TELEFONO</span> {{ $paciente[0]->telefono }}</div>
        <div><span>CORREO</span> <a href="mailto:{{ $paciente[0]->correo }}">{{ $paciente[0]->correo }}</a></div>
        <div><span>DIRECCION</span> {{ $paciente[0]->direccion }}</div>
        <div><span>EDAD</span> {{ $paciente[0]->edad }}</div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th>Medicamentos</th>
            <th>Indicaciones</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($receta as $re)
            <tr>
                    <td>{{ $re->medicamentos }}</td>
                    <td>{{ $re->indicaciones }}</td>
                  </tr>      
            @endforeach
        </tbody>
      </table>
    </main>
    <footer>
      Clinica System
    </footer>
  </body>
</html>