@extends('layouts.base')
@section('title')
 Citas    
@endsection
@section('contenido')
<div  class="row">
<br/>
<div id="container" style="min-width: 50px; height: 300px; max-width: 300px; margin: 0 auto"></div>
</div>

@endsection
@section('script')
<script>
Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: 0,
        plotShadow: false
    },
    title: {
        text: 'Lista<br>Triajes<br>2019',
        align: 'center',
        verticalAlign: 'middle',
        y: 60
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            dataLabels: {
                enabled: true,
                distance: -50,
                style: {
                    fontWeight: 'bold',
                    color: 'blue'
                }
            },
            startAngle: -90,
            endAngle: 90,
            center: ['50%', '75%'],
            size: '110%'
        }
    },
    series: [{
        type: 'pie',
        name: 'Pacientes Para Triaje',
        innerSize: '50%',
        data: [
            ['Pendiente', 5],
            ['Atendido', 95],
        ]
    }]
});
</script>
@endsection



