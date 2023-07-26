<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Consultas</title>
    <link rel="stylesheet" href="../public/build/css/style.css" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="logo.png">
      </div>
      <h1>Lista de Consultas</h1>
      <div id="company" class="clearfix">
        <div>Clinica</div>
        <div>Direccion,<br />Telefono</div>
        <div>anexo</div>
        <div><a href="mailto:company@example.com">clinica.com</a></div>
      </div>
      <div id="project">
        <div><span>PROJECT</span> Website development</div>
        <div><span>CLIENT</span> John Doe</div>
        <div><span>ADDRESS</span> 796 Silver Harbour, TX 79273, US</div>
        <div><span>EMAIL</span> <a href="mailto:john@example.com">john@example.com</a></div>
        <div><span>DATE</span> August 17, 2015</div>
        <div><span>DUE DATE</span> September 17, 2015</div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">Fecha de Consulta</th>
            <th class="desc">Hora de Consulta</th>
            <th>Paciente</th>
            <th>DNI</th>
            <th>Edad</th>
            <th>Estado de la Consulta</th>
            <th>Motivo de la Consulta</th>
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
                  </tr>      
            @endforeach
        </tbody>
      </table>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>