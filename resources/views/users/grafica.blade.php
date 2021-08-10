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
    var usuario=<?php echo json_encode($usuario)
    ?>;
    Highcharts.chart('container', {
        chart: {
          type: 'area'
        },
        title:{
            text:'Nuevos Usuarios'
        },
        subtitle:{
            name:'Nuevos Usuarios'
        },
        xAxis:{
            categories:['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre']
        },
        yAxis:{
            title:{
                text: 'Cantidad de usuarios'
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
            name:'Usuarios',
            data: usuario

        }],
        responsive:{},
    });
</script>

@stop