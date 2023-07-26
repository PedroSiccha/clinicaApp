<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Citas</title>

    <!-- Custom Theme Style -->
    <style>
        .container {
            position: absolute;
            top: 10%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        table{
            width: 800px;
            border-collapse: collapse;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        td{
            padding: 15px;
            text-align: center;
        }
        th{
            text-align: center;
            background-color: rgba(0, 0, 255, 0.2);
            color: #1c2938;
        }
        h4{
            font-family: Vegur, 'PT Sans', Verdana, sans-serif;
            font-size: large;
            text-align: center;
        }
    </style>
<h4>LISTA DE CITAS PARA EL DÍA <?php echo date('d/m/Y') ?></h4>
</head>
<body>
    <div class="container">
            
                    <table>
                      <thead>
                        <tr>
                          <th>Hora de Atención</th>
                          <th>Nombre</th>
                          <th>DNI</th>
                          <th>Teléfono</th>
                          <th>Motivo</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($citasPendientes as $cp)
                            <tr>
                                <th scope="row">{{ $cp->horaten }}</th>
                                <td>{{ $cp->nombre }}</td>
                                <td>{{ $cp->dni }}</td>
                                <td>{{ $cp->telefono }}</td>
                                <td>{{ $cp->motivo }}</td>
                            </tr>      
                          @endforeach
                        
                      </tbody>
                    </table>
    </div>

</body>
</html>