<!DOCTYPE html>
<html>
<head>
	<title>Ticket Citas</title>
	<style type="text/css">
		body {
		    margin: 0;
		    padding: 0;
		    background-color: #D5D5D5;
		    font: 12pt "Tahoma";

		}
		@page {
		    size: A4;
		    margin: 0;

		}
		@media print {
		    html, body {
		    width: 88mm;
		    height: 50mm;
		  }
		}
		.page {
		    width: 88mm;
		    min-height: 5cm;
		    padding: 0cm;
		    margin: 1cm auto;   
		    background-color: #FFFFFF;

		}
		.subpage {
		    padding: 1cm;
		    height: 120mm;
		    outline: 2cm;

		}
		#titulo {
			text-align: center;
			font-size: 18px;
			font-family: serif;
			color: #066CEA;
			line-height:10px;
			position: relative;
			right: 0px;
			bottom: 60px;
		}
		#limites {
		    text-align: center;
			font-size: x-small;
			color: #066CEA;
			line-height:10px;
			position: relative;
			right: 30px;
			bottom: 50px;
		}

		#fechacita {
			text-align: center;
			font-size: 10px;
			color: #066CEA;
			line-height:15px;
			position: relative;
			right: 80px;
			bottom: 50px;
		}
		#horaCita {
			text-align: center;
			font-size: 10px;
			color: #066CEA;
			line-height:10px;
			position: relative;
			right: 94px;
			bottom: 50px;
		}
		#motivo {
			text-align: center;
			font-size: 10px;
			color: #066CEA;
			line-height:15px;
			position: relative;
			right: 81px;
			bottom: 50px;
		}
		#paciente {
			text-align: center;
			font-size: 10px;
			color: #066CEA;
			line-height:15px;
			position: relative;
			right: 65px;
			bottom: 50px;
		}
		#numHistoria {
			text-align: center;
			font-size: 10px;
			color: #066CEA;
			line-height:15px;
			position: relative;
			right: 90px;
			bottom: 50px;
		}
		#recomendacion {
			text-align: center;
			font-size: 8px;
			color: #066CEA;
			line-height:15px;
			position: relative;
			right: 0px;
			bottom: 50px;
		}
		#lFirma {
			text-align: center;
			font-size: 8px;
			color: #066CEA;
			line-height:5px;
			position: relative;
			right: 0px;
			bottom: 10px;
		}
		#docFirma {
			text-align: center;
			font-size: 8px;
			color: #066CEA;
			line-height:5px;
			position: relative;
			right: 0px;
			bottom: 10px;
		}
		#espFira {
			text-align: center;
			font-size: 8px;
			color: #066CEA;
			line-height:5px;
			position: relative;
			right: 0px;
			bottom: 10px;
		}
		#codFirma {
			text-align: center;
			font-size: 8px;
			color: #066CEA;
			line-height:4px;
			position: relative;
			right: 0px;
			bottom: 10px;
		}
	</style>
</head>
<body>
<div id="lateral">
	<div class="page">
	    <div class="subpage">
	    	<p style="text-align: center; position: relative; left: 0px; bottom: 50px;"><img src="../images/logoFinal.png" width="100" height="150"></p>
	    	<h1 id = "titulo">Ticket de Cita</h1>
	    	<h1 id = "limites">__________________________________________________</h1>
	    	<h1 id = "fechacita">Fecha de Cita: {{ $cita[0]->fecaten }}</h1>
            <h1 id = "horaCita">Hora de la Cita: {{ $cita[0]->horaten }}</h1>
            @foreach ($cita as $c)
            <h1 id = "motivo">Tipo de Atención: {{ $c->motivo }}</h1>    
            @endforeach
	    	<h1 id = "limites">__________________________________________________</h1>
	    	<h1 id = "paciente">Paciente: {{ $ticket[0]->nombre }} {{ $ticket[0]->apellido }}</h1>
	    	<h1 id = "numHistoria">Numero de Historia: {{ $ticket[0]->id }}</h1>
	    	<h1 id = "limites">__________________________________________________</h1>
	    	<h1 id = "recomendacion">PRESENTARSE 30 MINUTOS ANTES DE SU CITA</h1>
			<h1 id = "limites">__________________________________________________</h1>


			<h2 id = "lFirma">_________________________</h2>
			<h2 id = "docFirma">Dr. Raúl Cochachin Rodríguez</h2>
			<h2 id = "espFira">ESPECIALISTA GINECOLOGÍA y OBSTETRA</h2>
			<h2 id = "codFirma">C.M.P. 20475 R.N.E. 14613</h2>
	    </div>    
	</div>
</div>
</body>
</html>