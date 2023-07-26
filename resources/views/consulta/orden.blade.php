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
      <h1>Orden de Exámen</h1>
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
            <th>Exámen</th>
            <th>Motivo</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($orden as $or)
            <tr>
                    <td>{{ $or->examen }}</td>
                    <td>{{ $or->motivo }}</td>
                  </tr>      
            @endforeach
        </tbody>
      </table>
      <div id="notices">
        <div>MÉDICO ENCARGADO:</div>
        <div class="notice">{{ $orden[0]->medico }}.</div>
      </div>
      <div id="notices">
        <div>Laboratorio recomendado:</div>
        <div class="notice">{{ $orden[0]->laboratorio }}, {{ $orden[0]->ruclab }}.</div>
      </div>
    </main>
    <footer>
      Clinica System
    </footer>
  </body>
</html>