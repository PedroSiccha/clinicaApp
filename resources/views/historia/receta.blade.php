<!DOCTYPE html>
<html>
<head>
	<title>Receta Médica</title>
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
		    padding: 0cm;
		    margin: 1cm auto;   

		}
		.rota-horizontal{
		    -webkit-transform: scaleX(-1);
		    -moz-transform: scaleX(-1);
		    transform: scaleX(-1);
		    filter: FlipH;
		    -ms-filter: "FlipH";

		}
		.subpage {
		    padding: 1cm;
		    height: 256mm;
		    outline: 2cm;

		}
		#titulo {
			text-align: center;
			font-size: medium;
			color: #066CEA;
			line-height:10px
		}
		#nombre {
		    text-align: center;
			font-size: large;
			font-family: cursive;
			color: #066CEA;
			line-height:10px
		}
		#espcialidad {
			text-align: center;
			font-size: small;
			color: #066CEA;
			line-height:5px
		}
		
		#items {
		    text-align: left;
			font-size: x-small;
			font-weight: normal;
			color: #066CEA;
			line-height:5px;
			position: relative;
			left: 100px;
		}
		#vinieta {
			color: #EA0610;
		}
		#dr_logo {
		    text-align: left;
			font-size: 8px;
			font-weight: normal;
			color: #EA0610;
		}
		#prevencion {
		    text-align: left;
			font-size: 11px;
			font-weight: bold;
			color: #EA0610;
			line-height:5px;
		}
		#consultorio {
		    text-align: left;
			font-size: 11px;
			font-weight: bold;
			position: absolute;
			color: #EA0610;
		}
		#separador {
		    text-align: left;
			font-size: 18px;
			font-weight: bold;
			position: relative;
			color: #066CEA;
			bottom: 25px;
			left: 65px;
		}
		#direccion {
		    text-align: left;
			font-size: 11px;
			font-weight: bold;
			position: relative;
			color: #066CEA;
			bottom: 60px;
			left: 75px;
		}
		#telefono {
		    text-align: left;
			font-size: 8px;
			font-weight: bold;
			position: relative;
			color: #066CEA;
			bottom: 70px;
			left: 75px;
		}
		#frente {
		    text-align: left;
			font-size: 8px;
			font-weight: bold;
			position: relative;
			color: #EA0610;
			bottom: 85px;
			left: 220px;
		}

		#name {
		    text-align: left;
			font-size: 15px;
			font-weight: bold;
			color: #066CEA;
			line-height:5px;
			position: relative;
			bottom: 70px;
		}
		#apellidos {
		    text-align: left;
			font-size: 15px;
			font-weight: bold;
			color: #066CEA;
			line-height:5px;
			position: relative;
			bottom: 65px;
		}
		#diagnostico {
		    text-align: left;
			font-size: 15px;
			font-weight: bold;
			color: #066CEA;
			line-height:5px;
			position: relative;
			bottom: 60px;
		}

		#lFirma {
		    text-align: left;
			font-size: 10px;
			font-weight: bold;
			color: #066CEA;
			line-height:5px;
			position: relative;
			bottom: 150px;
			left: 300px;
		}

		#docFirma {
		    text-align: left;
			font-size: 10px;
			font-weight: bold;
			color: #066CEA;
			line-height:5px;
			position: relative;
			bottom: 150px;
			left: 305px;
		}
		#espFira {
		    text-align: left;
			font-size: 7px;
			font-weight: bold;
			color: #066CEA;
			line-height:5px;
			position: relative;
			bottom: 150px;
			left: 305px;
		}
		#codFirma {
		    text-align: left;
			font-size: 7px;
			font-weight: bold;
			color: #066CEA;
			line-height:5px;
			position: relative;
			bottom: 150px;
			left: 330px;
		}

		#lFirmaD {
		    text-align: left;
			font-size: 10px;
			font-weight: bold;
			color: #066CEA;
			line-height:5px;
			position: relative;
			bottom: 120px;
			left: 300px;
		}

		#docFirmaD {
		    text-align: left;
			font-size: 10px;
			font-weight: bold;
			color: #066CEA;
			line-height:5px;
			position: relative;
			bottom: 120px;
			left: 305px;
		}
		#espFiraD {
		    text-align: left;
			font-size: 7px;
			font-weight: bold;
			color: #066CEA;
			line-height:5px;
			position: relative;
			bottom: 120px;
			left: 305px;
		}
		#codFirmaD {
		    text-align: left;
			font-size: 7px;
			font-weight: bold;
			color: #066CEA;
			line-height:5px;
			position: relative;
			bottom: 120px;
			left: 330px;
		}




		#indicaciones {
		    text-align: center;
			font-size: 15px;
			font-weight: bold;
			color: #066CEA;
			line-height:5px;
			position: relative;
			bottom: 10px;
			text-decoration: underline;
		}
		#nameDerecha {
			font-size: 10px;
			font-weight: bold;
			color: #066CEA;
			line-height:5px;
			position: relative;
			bottom: 0px;
		}

		@page {
		    size: landscape A4;
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

		#lateral { 
			width: 50%; 
			 page-break-inside: avoid;
		}
		#lateralDerecho { 
			width: 50%; 
			page-break-inside: avoid;
			position: relative;
			bottom: 1160px;
			left: 800px;
		}
		table {     
			font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
		    font-size: 12px;    
		    margin: 45px;     
		    width: 480px; 
		    text-align: left;    
		    border-collapse: collapse; 
		    color: #066CEA;
		    position: relative;
		    bottom: 70px;
		}

		th {     
			font-size: 13px;     
			font-weight: normal;     
			padding: 8px;     
		    border-top: 1px solid;    
		    border-bottom: 1px solid;
		    border-left: 1px solid;     
		    border-right: 1px solid;     
		}

		td {    
			padding: 8px;       
		    border-top: 1px solid; 
		    border-bottom: 1px solid; 
		    border-left: 1px solid; 
		    border-right: 1px solid; 
		}

		tr:hover td { 
			background: #d0dafd; 
			color: #339; 
		}

		.tab {     
			font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
		    font-size: 10px;    
		    margin: 45px;     
		    width: 100px; 
		    text-align: center;    
		    border-collapse: collapse; 
		    color: #EA0610;
		    position: relative;
		    bottom: 70px;
		}
		.fec {     
			padding: 8px;       
		    border-top: 1px solid; 
		    border-bottom: 1px solid; 
		    border-left: 1px solid; 
		    border-right: 1px solid;
		}
		.titFec {     
			font-size: 10px; 
			color: #066CEA; 
		}

		.derecha {     
			font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
		    font-size: 12px;    
		    margin: 45px;     
		    width: 480px; 
		    text-align: left;    
		    border-collapse: collapse; 
		    color: #066CEA;
		    position: relative;
		    bottom: 20px;
		}
		.tabDerecha {     
			font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
		    font-size: 10px;    
		    margin: 45px;     
		    width: 100px; 
		    text-align: center;    
		    border-collapse: collapse; 
		    color: #EA0610;
		    position: relative;
		    bottom: 20px;
		}

        #imprimir {
            color: #0099CC;
            background: transparent;
            border: 2px solid #0099CC;
            border-radius: 6px;
			position: absolute;
            left: 700px;
		}
	</style>
</head>
<body>    
    <button class="btn btn-default" onclick="imprimir();" id="imprimir"><i class="fa fa-print"></i> Imprimir</button>
<div id="lateral">
	<div class="page">
	    <div class="subpage">
	    	<h1 id = "titulo">CENTRO MÉDICO ECOGRÁFICO</h1>
	    	<h1 id = "nombre">Dr. Raúl Cochachin Rodriguez</h1>
	    	<h1 id = "espcialidad">Especialista: Ginecología Y Obstetricia</h1>
	    	<h1 id = "espcialidad">C.M.P. 20475 R.N.E. 14613</h1>
	    	<h2 id = "dr_logo">Dr. COCHACHIN</h2>
	    	<h1 id = "items"><b id="vinieta">&#10154;</b> Ecografias: 3D y 4D - Doppler Color.</h1>
	    	<h1 id = "items"><b id="vinieta">&#10154;</b> Control Pre Natal, Partos, Cesáreas, Planificación Familiar.</h1>
	    	<h1 id = "items"><b id="vinieta">&#10154;</b> Infertilidad, Tumores, Fibromas, Prolapsos.</h1>
	    	<h1 id = "items"><b id="vinieta">&#10154;</b> Prevencion y Tratamiento de Cancer Ginecológico.</h1>
	    	<h1 id = "items"><b id="vinieta">&#10154;</b> Crioterapia.</h1>
	    	<h2 id = "prevencion">PREVENCIÓN, DIAGNOSTICO Y TRATAMIENTO DE CÁNCER GINECOLÓGICO TEMPRANO</h2>
	    	<h2 id = "prevencion">Consultorio</h2>
	    	<h2 id = "separador">|</h2>
	    	<h2 id = "direccion">Jr. 28 de Julio N° 508 2do. Piso - Huaraz</h2>
	    	<h2 id = "telefono">Telf.: 043 348551 Cel.: 940180239</h2>
	    	<h2 id = "frente">Frente al Centro Cultural</h2>
	    	<h1 id = "name"><b>Nombres:</b> {{ $paciente[0]->nombre }}</h1>
	    	<h2 id = "apellidos"><b>Apellidos:</b> {{ $paciente[0]->apellido }}  <b>Edad:</b> {{ $paciente[0]->edad}} años</h2>

			<table>
				<tr> 
					<th style="font-size: 10px">Rp. Medicamento o Insumo</th> 
					<th>CONCENTRACIÓN</th> 
					<th>PRESENTACIÓN</th> 
					<th>CANTIDAD</th> 
                </tr>
                @foreach ($receta as $re)
                    <tr> 
                        <td>{{ $re->medicamento }}</td> 
						<td>{{ $re->concentracion }}</td> 
						<td>{{ $re->presentacion }}</td> 
						<td>{{ $re->cantidad }}</td> 
                    </tr>    
                @endforeach
			</table>

			<table class="tab">
				<tr class="fec"> 
					<th>{{ date('d') }}</th> 
					<th>{{ date('M') }}</th> 
					<th>{{ date('Y') }}</th>
				</tr>
				<tr> 
					<td><b style="color: #066CEA;">DIA</b></td> 
					<td><b style="color: #066CEA;">MES</b></td> 
					<td><b style="color: #066CEA;">AÑO</b></td>
				</tr>
			</table>
			<h2 id = "lFirma">_________________________</h2>
			<h2 id = "docFirma">Dr. Raúl Cochachin Rodríguez</h2>
			<h2 id = "espFira">ESPECIALISTA GINECOLOGÍA y OBSTETRA</h2>
			<h2 id = "codFirma">C.M.P. 20475 R.N.E. 14613</h2>
	    </div>    
	</div>
</div>

<div id="lateralDerecho">
	<div class="page">
	    <div class="subpage">
	    	<h1 id = "titulo">CENTRO MÉDICO ECOGRÁFICO</h1>
	    	<h1 id = "nombre">Dr. Raúl Cochachin Rodriguez</h1>
	    	<h1 id = "espcialidad">Consultorio: Jr. 28 de Julio N° 508 2do- Piso Of. 05 - Huaraz</h1>
	    	<h1 id = "espcialidad">Telf.: 043 348551 Celular: 940180239</h1>
	    	<h2 id = "dr_logo">Dr. COCHACHIN</h2>
	    	<h2 id = "indicaciones">INDICACIONES</h2>
	    	<h1 id = "nameDerecha"><b>Apellidos y Nombres:</b> {{ $paciente[0]->apellido}} {{ $paciente[0]->nombre}} </h1>
			<table class="derecha">
				<tr> 
					<th>Medicamento</th> 
					<th>Dosis</th> 
					<th>Vía</th> 
					<th>Frec.</th> 
					<th>Duración</th>
					<th>Observación</th> 
                </tr>
                @foreach ($receta as $re)
				    <tr>    
                        <td>{{ $re->medicamento }}</td> 
						<td>{{ $re->dosis }}</td> 
						<td>{{ $re->via }}</td> 
						<td>{{ $re->frecuencia }}</td> 
						<td>{{ $re->duracion }}</td> 
						<td>{{ $re->indicacion }}</td> 
                    </tr>
                @endforeach
			</table>

			<table class="tabDerecha">
				<tr class="fec"> 
					<th>{{ date('d') }}</th> 
					<th>{{ date('M') }}</th> 
					<th>{{ date('Y') }}</th>
				</tr>
				<tr> 
					<td><b style="color: #066CEA;">DIA</b></td> 
					<td><b style="color: #066CEA;">MES</b></td> 
					<td><b style="color: #066CEA;">AÑO</b></td>
				</tr>
			</table>
			<h2 id = "lFirmaD">_________________________</h2>
			<h2 id = "docFirmaD">Dr. Raúl Cochachin Rodríguez</h2>
			<h2 id = "espFiraD">ESPECIALISTA GINECOLOGÍA y OBSTETRA</h2>
			<h2 id = "codFirmaD">C.M.P. 20475 R.N.E. 14613</h2>
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