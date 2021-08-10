@extends('adminlte::page')

@section('title', 'Laboratorio')

@section('content_header')
    <h1> Listar Reservas</h1>
@stop

@section('content')
@if ($errors->count() > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul> 
</div>
@endif

<div class="card">
  <div class="card-header">
    <div class="form-row">
        <div class="end-100 mr-lg-5">
        <a href="{{route('Reservagrafica')}}" class="btn btn-warning  fas fa-chart-bar">Grafica Reserva</a>
      </div>
      <div class=" end-100 " style="float: right">
        <a class="btn btn-success  fas fa-calendar-plus"> Total Reservas:{{$count}}</a>
      </div>
     
    </div>
</div>
        
  </div>
<div class="card">
  <div class="card-body">
      <table class="table table-striped" id="reservas" >

        <thead>

          <tr>
            <th scope="col">Fecha</th>
            <th scope="col">periodo</th>
            <th scope="col">Sala</th>

          
          </tr>
        </thead>
        <tbody>

          @foreach ($reservations as $reservation)
          <tr>
            <td>{{$reservation->date->toFormattedDateString()}}</td>

            <td>{{$reservation->date}}</td>   
                  {{--<td>  {{$reservation->user->name}}</td><i class="fas fa-file-signature"></i><i class="fas fa-clipboard-check"></i>--}}
               <td>{{$room=DB::table('rooms')->where('id',$reservation->room_id)->value('name')}}</td>
               <td>
                
               </td>
             
          </tr> 
       @endforeach
         
         

        </tbody>

      </table>
  </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
         $('#reservas').DataTable();
        } );
    </script>
@stop