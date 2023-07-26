<!DOCTYPE html>
<html>
<head>
	<title>Examen de Laboratorio</title>
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
			bottom: 70px;
		}

		#titNomb {
			text-align: center;
			font-size: 10px;
			color: #066CEA;
			line-height:15px;
			position: relative;
			right: 105px;
			bottom: 70px;
		}
		#nombres {
			text-align: center;
			font-size: 10px;
			color: #066CEA;
			line-height:10px;
			position: relative;
			right: 95px;
			bottom: 70px;
		}
		#edad {
			text-align: center;
			font-size: 10px;
			color: #066CEA;
			line-height:15px;
			position: relative;
			right: 120px;
			bottom: 70px;
		}
		#titExam {
			text-align: center;
			font-size: 13px;
			color: #066CEA;
			line-height:15px;
			position: relative;
			right: 0px;
			bottom: 70px;
		}
		#examen {
			text-align: center;
			font-size: 10px;
			color: #066CEA;
			line-height:15px;
			position: relative;
			right: 120px;
			bottom: 70px;
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
	    	<h1 id = "titulo">Exámen de Laboratorio</h1>
	    	<h1 id = "limites">__________________________________________________</h1>
	    	<h1 id = "titNomb">Apellidos y Nombres</h1>
	    	<h1 id = "nombres">{{ $orden[0]->nombre}} {{ $orden[0]->apellido}}</h1>
	    	<h1 id = "edad">Edad: 25 años</h1>
	    	<h1 id = "limites">__________________________________________________</h1>
            <h1 id = "titExam">Examenes</h1>
            @foreach ($orden as $o)
            <h1 id = "examen">{{ $o->examen }}</h1>    
            @endforeach
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