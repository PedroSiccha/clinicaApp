<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Orden Médica</title>
    <link rel="stylesheet" href="../public/build/css/style.css" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="logo.png">
      </div>
      <h1>Orden de Exámen Externo</h1>
      <div id="company" class="clearfix">
        <div>datos</div>
        <div>de la,<br />clinica</div>
        <div>anexo</div>
        <div><a href="mailto:company@example.com">clinica.com</a></div>
      </div>
      <div id="project">
        <div><span>PACIENTE</span> {{ $orden[0]->nombre }}</div>
        <div><span>EDAD</span> {{ $orden[0]->edad }}</div>
        <div><span>DNI</span> {{ $orden[0]->dni }}</div>
        <div><span>CORREO</span> <a href="mailto:{{ $orden[0]->correo }}">{{ $orden[0]->correo }}</a></div>
        <div><span>ESTADO CIVIL</span> {{ $orden[0]->EstadoCivil }}</div>
        <div><span>GÉNERO</span> {{ $orden[0]->Genero }}</div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th>Motivo de Exámen</th>
            <th>Tipo de Exámen</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($orden as $o)
            <tr>
                    <td>{{ $o->MotivoOrden }}</td>
                    <td>{{ $o->TipoExamen }}</td>
                  </tr>      
            @endforeach
        </tbody>
      </table>
      <div id="notices">
        <div>MÉDICO ENCARGADO:</div>
        <div class="notice">{{ $orden[0]->Medico }}.</div>
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>