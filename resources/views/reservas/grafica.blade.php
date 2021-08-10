@extends('adminlte::page')

@section('title', 'Laboratorio')

@section('content_header')

@stop

@section('content')

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<figure class="highcharts-figure">
  <div id="container"></div>
 
</figure>

<script type="text/javascript">
    var reserva=<?php echo json_encode($reserva)
    ?>;
    Highcharts.chart('container', {
        chart: {
          type: 'bar'
        },
        title:{
            text:'Escala Reserva'
        },
        subtitle:{
            name:'Nuevas Reservas'
        },
        xAxis:{
            categories:['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre']
        },
        yAxis:{
            title:{
                text: 'Cantidad de Reservas'
            }
        },
        legend:{
            layout:'vertical',
            align:'right',
            verticalAlign:'middle'
        },
        plotOptions:{
            series:{
                allowPointSelect:true
            }
        },
        series:[{
            name:'Reservas',
            data: reserva

        }],
        responsive:{},
    });
</script>

@stop