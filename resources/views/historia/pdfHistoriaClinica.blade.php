<!DOCTYPE html>
<html>
<head>
	<title>Historia Clincia</title>
	<style type="text/css">
		body {
		    margin: 0;
		    padding: 0;
		    background-color: #FAFAFA;
		    font: 12pt "Tahoma";
		}
		* {
		    box-sizing: border-box;
		    -moz-box-sizing: border-box;
		}
		.page {
		    width: 21cm;
		    min-height: 29.7cm;
		    padding: 2cm;
		    margin: 1cm auto;
		    
		    
		    
		}
		.subpage {
		    padding: 1cm;
		    height: 256mm;
		    outline: 2cm;

		}

		#titulo {
			text-align: center;
			font-size: medium;
		}
		
		#fecha {
		    text-align: right;
			font-size: x-small;
		}

		#filiacion {
			text-align: left;
			font-size: x-small;
			text-decoration: underline;
		}

		#nombre {
			text-align: left;
			font-size: small;
			font-weight: normal;
			
		}
		#dPersonales {
		    text-align: left;
			font-size: small;
			font-weight: normal;
		}
		#lugares {
		    text-align: left;
			font-size: small;
			font-weight: normal;
		}
		#contacto {
		    text-align: left;
			font-size: x-small;
			font-weight: normal;
		}

		@page {
		    size: A4;
		    margin: 0;
		}
		@media print {
		    .page {
		        margin: 0;
		        border: initial;
		        border-radius: initial;
		        width: initial;
		        min-height: initial;
		        box-shadow: initial;
		        background: initial;
		        page-break-after: always;
		    }
		}

		#imprimir {
            color: #000000;
            background: transparent;
            border: 0.5px solid #000000;
            border-radius: 6px;
			position: absolute;
            left: 700px;
		}
	</style>
</head>
<body>
<div class="book">
	<div class="page">
			<button class="btn btn-default" onclick="imprimir();" id="imprimir"><i class="fa fa-print"></i> Imprimir</button>
	    <div class="subpage">
	    	<h1 id="titulo">HISTORIA CLINICA</h1>
	    	<h2 id = "fecha">FECHA: 02/09/2019  HORA: 17:03  N° HCL: {{ $paciente[0]->id }}</h2>
	    	<h1 id="filiacion">FILIACION:</h1>
	    	<h1 id="nombre"><b>APELLIDOS Y NOMBRES:</b> {{ $paciente[0]->apellido }} {{ $paciente[0]->nombre }}</h1>
	    	<h2 id = "dPersonales"><b>Fecha de Naciemiento:</b> {{ $paciente[0]->fecnac }}  <b>Edad:</b> {{ $paciente[0]->edad }} años  <b>Sexo:</b> {{ $paciente[0]->genero }}  <b>DNI:</b> 72690062</h2>
	    	<h2 id = "lugares"><b>Lugar de Nacimiento:</b> {{ $paciente[0]->lugarnac }}  <b>Lugar de Procedencia:</b> {{ $paciente[0]->lugarproc }}</h2>
	    	<h2 id = "contacto"><b>Estado Civil:</b> {{ $paciente[0]->estadocivil }}. <b>G.Instruccion: </b> {{ $paciente[0]->instruccion }}. <b>Ocupacion: </b>{{ $paciente[0]->ocupacion }}. <b>Teléfono: </b>944646619 <br>
	    		<b>Direccion:</b> {{ $paciente[0]->direccion }}. <b>E-Mail: </b>{{ $paciente[0]->correo }}</h2>
	    	<h1 id="nombre"><b>DATOS DEL ACOMPAÑANTE:</b></h1>
	    	<h2 id = "dPersonales"><b>Apellidos y Nombres:</b> {{ $acompanate[0]->apellido }} {{ $acompanate[0]->nombre }}.  <b>Parentezco:</b> {{ $acompanate[0]->parentezco }}.</h2>
	    	<h2 id = "dPersonales"><b>DNI:</b> {{ $acompanate[0]->dni }}.  <b>Telefono:</b> {{ $acompanate[0]->telefono }}.</h2>
	    	<h1 id="nombre"><b>ANTECEDENTES PERSONALES:</b></h1>
	    	<h2 id = "dPersonales"><b>FUR:</b> {{ $historia[0]->FecUltimaRegla }}.  <b>G:</b> {{ $historia[0]->CanGestaciones }}. <b>P</b> {{ $historia[0]->ValorA }}-{{ $historia[0]->ValorB }}-{{ $historia[0]->ValorC }}-{{ $historia[0]->ValorD }} <b>PAP:</b> {{ $historia[0]->FecPapaNicolao }} <b>MAC: </b>{{ $historia[0]->MetodoAnticonceptivo }}</h2>
	    	<h1 id="nombre"><b>ANTECEDENTES PATOLOGICOS:</b> {{ $historia[0]->antecPatologico }}</h1>
			<h2 id = "dPersonales"><b>Reacciones Alergicas:</b>
				@foreach( $historia as $h)
				{{ $h->alergias }}.
				@endforeach
			</h2>
			@foreach( $consulta as $c )
	    	<h1 id="titulo">CONSULTA</h1>
	    	<h1 id="nombre"><b>MOTIVO DE LA CONSULTA:</b>{{ $c->motivo }}.  <b>Tiempo de Enfermedad: </b> {{ $c->tiempo }}.</h1>
	    	<h1 id="nombre">Funciones Biologicas: Ap: {{ $c->apetito }}. Sed: {{ $c->sed }}. Sueño: {{ $c->suenio }}. Orina: {{ $c->orina }}. Deposiciones: {{ $c->deposicion }}.</h1>
	    	<h1 id="nombre"><b>EXAMEN CLINICO:</b>FV: T: {{ $historia[0]->temperatura }}C°. PA: {{ $historia[0]->sistolica }}/{{ $historia[0]->diastolica }} mmhg. P: {{ $historia[0]->pulso }}X'. Peso: {{ $historia[0]->peso }}kg. Talla: {{ $historia[0]->talla }}cm.</h1>
			<h1 id="nombre">Inspeccion General:</h1>
			@foreach ($insGenerales as $ig)
			<h1 id="nombre">{{ $ig->nombre}}: {{ $ig->resultado}}.</h1>	
			@endforeach
	    	<h1 id="nombre">Exámen Ginecológico:</h1>
	    	<h1 id="nombre">GE y BUS: Normal. Vagina: Normal.</h1>
	    	<h1 id="nombre">Cérvix: Normal. Útero: Normal.</h1>
	    	<h1 id="nombre">Ovarios: Normal. Fondo de Saco: Normal.</h1>
	    	<h1 id="nombre"><b>DIAGNOSTICO:</b> {{ $c->descripcion }}. CIE 10: {{ $c->codigo }}</h1>
	    	<h1 id="nombre"><b>TRATAMIENTO:</b> {{ $c->medicamento }} {{ $c->indicacion }}</h1>
			<h1 id="nombre"><b>OBSERVACIONES:</b>{{ $c->observacion }}</h1>
			@endforeach
	    </div>    
	</div>
</div>

</body>
<script>
	function imprimir()
		{
		var Obj = document.getElementById("imprimir");
		Obj.style.visibility = 'hidden';
		window.print();
		}
</script>
</html>
