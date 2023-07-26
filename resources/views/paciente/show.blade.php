@extends('layouts.base')
@section('title') 
 {{ $datosPersonales[0]->nombre }}   
@endsection
@section('contenido')

<div class="" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Perfil de Paciente</h3>
            </div>
        </div>
        
        <div class="clearfix"></div>

        <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
            <div class="x_title">
                <h2>Historial Completo </h2>
                <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                <div class="profile_img">
                    <div id="crop-avatar">
                    <!-- Current avatar -->
                    
                    </div>
                </div>
                <h3>{{ $datosPersonales[0]->nombre}}</h3>

                <ul class="list-unstyled user_data">
                    <li><i class="fa fa-map-marker user-profile-icon"></i> {{ $datosPersonales[0]->direccion}}
                    </li>

                    <li>
                    <i class="fa fa-briefcase user-profile-icon"></i> {{ $datosPersonales[0]->ocupacion}}
                    </li>

                    <li class="m-top-xs">
                    <i class="fa fa-mobile user-profile-icon"></i>
                    <a href="#" target="_blank">{{ $datosPersonales[0]->telefono}}</a>
                    </li>
                </ul>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12">

                <div class="profile_title">
                    <div class="col-md-6">
                    <h2>Actividades del Paciente</h2>
                    </div>
                    <div class="col-md-6">
                    <div id="reportrange" class="pull-right" style="margin-top: 5px; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #E6E9ED">
                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                        <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                    </div>
                    </div>
                </div>
                <!-- start of user-activity-graph -->
                <div id="graph_bar"></div>
                <!-- end of user-activity-graph -->

                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Acompañantes</a>
                    </li>
                    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Ultimos Diagnósticos</a>
                    </li>
                    <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Exámenes</a>
                    </li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                        <!-- start recent activity -->
                        <ul class="messages">
                            @foreach ($datosAcompanante as $da)
                            <li>
                                <div class="message_date">
                                <h3 class="date text-info">{{ $da->edad }}</h3>
                                <p class="month">{{ $da->fecnac }}</p>
                                </div>
                                <div class="message_wrapper">
                                <h4 class="heading">{{ $da->nombre }}</h4>
                                <p class="message">DNI: {{ $da->fecnac }}, Telefono: {{ $da->dni }}</p>
                                <p class="message">Correo: {{ $da->correo }}, Direccion: {{ $da->direccion }}</p>
                                <p class="message">Parentezco: {{ $da->parentezco }}</p>
                                
                                <p class="url">
                                    <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                    <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
                                </p>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        <!-- end recent activity -->

                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                        <!-- start user projects -->
                        <table class="data table table-striped no-margin">
                        <thead>
                            <tr>
                            <th>#</th>
                            <th>Fecha de Consulta</th>
                            <th>Diagnóstico</th>
                            <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($resumenConsulta as $rc)
                            <tr>
                                <td>#</td>
                                <td>{{ $rc->FechaConsulta }}</td>
                                <td>{{ $rc->Diagnostico }}</td>
                                <td class="vertical-align-mid">
                                    <a <?php if ($rc->estado=="Atendido"){ $colorBtn = "success"; $icono = "check"; }else{ $colorBtn = "danger"; $icono = "exclamation-triangle"; }?> type="button" class="btn btn-round btn-{{ $colorBtn }} btn-sm"><i class="fa fa-{{ $icono }}"></i></a>
                                </td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                        <!-- end user projects -->

                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                            <table class="data table table-striped no-margin">
                                <thead>
                                    <tr>
                                    <th>#</th>
                                    <th>Fecha de Consulta</th>
                                    <th>Médico Solicitante</th>
                                    <th class="hidden-phone">Resultado de Exámen</th>
                                    <th>Documento</th>
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($resumenExamen as $re)
                                    <tr> 
                                        <td>#</td>
                                        <td>{{ $re->FechaConsulta }}</td>
                                        <td>{{ $re->Medico }}</td>
                                        <td class="hidden-phone">{{ $re->Resultado }}</td>
                                        
                                        <td class="vertical-align-mid">
                                            <button type="button" class="btn btn-app btn-xs" onclick="VerPdf('{{ $re->Documento }}')">
                                                <i class="glyphicon glyphicon-file"></i> Ver
                                            </button>
                                            <button type="button" class="btn btn-app btn-xs">
                                                <i class="glyphicon glyphicon-download-alt"></i> Descargar
                                            </button>
                                        </td>
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="MostrarPdf" style=" height: 100%">
    <div class="modal-dialog" style=" width: 70%; height: 100%">
        <div class="modal-content" style=" height: 95%">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body" id="pdfView" style=" height: 85%">
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>
@endsection
@section('script')



<script src="{{asset('../js/pdfobject.js')}}"></script>


<script>
function EditarPaciente(){
   $('#EditPaciente').modal({show:true});
   
   // alert("Editar Cliente")
}

function VerPdf(doc){
   $('#MostrarPdf').modal({show:true});
   PDFObject.embed("../storage/app/public/examen/4/uQ3nPuRCkpdGimWOy9G2BjC2R1LNitkdsMJMlUPj.pdf", "#pdfView");
   // alert("Editar Cliente")
}



function cargar_grafica_barras(anio,mes){

var options={
	 chart: {
	 	    renderTo: 'graph_bar',
            type: 'column'
        },
        title: {
            text: 'Numero de Registros en el Mes'
        },
        subtitle: {
            text: 'Source: plusis.net'
        },
        xAxis: {
            categories: [],
             title: {
                text: 'dias del mes'
            },
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'REGISTROS AL DIA'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y} </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'registros',
            data: []

        }]
}

$("#graph_bar").html( $("#cargador_empresa").html() );

var url = "grafica_registros/"+anio+"/"+mes+"";


$.get(url,function(resul){
var datos= jQuery.parseJSON(resul);
var totaldias=datos.totaldias;
var registrosdia=datos.registrosdia;
var i=0;
	for(i=1;i<=totaldias;i++){
	
	options.series[0].data.push( registrosdia[i] );
	options.xAxis.categories.push(i);


	}


 //options.title.text="aqui e podria cambiar el titulo dinamicamente";
 chart = new Highcharts.Chart(options);

})


}
</script> 
@endsection