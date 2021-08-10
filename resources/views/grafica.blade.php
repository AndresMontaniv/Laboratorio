@extends('adminlte::page')
@section('title', 'Laboratorio')
 
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
 <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
 <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
 <script src="http://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <title>Gráfico lineal</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
              <h2 class="text-center ">Gráfica total Pacientes </h2>
              <hr>
                <div id="graph" style="height: 350px;" class=" shadow"></div>
               
            </div>   
            <div class="col-md-6">
                <h2 class="text-center">Gráfica total Usuarios </h2>
                 <hr>
                 <div id="barra" style="height: 350px;" class="bg-white shadow"></div>
                
             </div>
        </div>
      
          <div class="row mt-2">
            <div class="col-md-6">
              <h2 class="text-center">Gráfica total Médicos </h2>
              <hr>
                <div id="graph3" style="height: 350px;" class="bg-white  shadow"></div>
          
           </div> 
           <div class="col-md-6">
            <h2 class="text-center">Gráfica total Administradores </h2>
            <hr>
            <div id="graph2" style="height: 350px;" class=" shadow"></div>
       </div> 
    </div>

    </div>
</body>
</html>


<script>
    Morris.Donut({
        element: 'graph',
        data: [
          <?php

          foreach ($newarray as $clave => $valor) {

              echo "{ value: ".$valor.", label: '".$laboratory[$clave-1]."', },";      
          } 
           ?>
        ],
        formatter: function (x) { return x + "Paciente"}
      }).on('click', function(i, row){
        console.log(i, row);
      });
    
</script>
<script>
  Morris.Donut({
      element: 'graph2',
      data: [
        <?php

        foreach ($administra as $clave => $valor) {

            echo "{ value: ".$valor.", label: '".$laboratory[$clave-1]."', },";      
        } 
         ?>
      ],
      backgroundColor: '#ccc',
    labelColor: '#060300',
    colors: [
    '#0BA462',
    '#39B580',
    '#67C69D',
    '#95D7BB'
   ],
       formatter: function (x) { return x + "Admin"}
    }).on('click', function(i, row){
      console.log(i, row);
    });
  
</script>

<script>
 // Use Morris.Bar
Morris.Bar({
    element: 'barra',
    data: [
    
      <?php
      foreach ($newarray2 as $clave => $valor) {

          echo "{x: '".$laboratory[$clave-1]."',y: ".$valor."},";      
      } 
       ?>
    ],
    xkey: 'x',
    ykeys: ['y'],
    labels: ['usuario'],
    barColors: function (row, series, type) {
      if (type === 'bar') {
        var red = Math.ceil(255 * row.y / this.ymax);
        return 'rgb(' + red + ',0,0)';
      }
      else {
        return '#000';
      }
    }
  });
 </script>
      <script>
        Morris.Donut({
            element: 'graph3',
            data: [
              <?php
      
              foreach ($medico as $clave => $valor) {
      
                  echo "{ value: ".$valor.", label: '".$laboratory[$clave-1]."', },";      
              } 
               ?>
            ],
            backgroundColor: '#ccc',
          labelColor: '#060300',
          colors: [
          '#FF4933',
          '#FFA533',
          '#FF7D33',
          '#FF9333'
         ],
             formatter: function (x) { return x + "Médico"}
          }).on('click', function(i, row){
            console.log(i, row);
          });
        
      </script>
@endsection