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
      <div class="col-md-3">
        <a href="{{route('reservations_create')}}" class="btn btn-primary ">Registrar Reserva</a>
      </div>
        <div class="col-md-3">
        <a href="{{route('Reservagrafica')}}" class="btn btn-warning  fas fa-chart-bar"> Reserva</a>
      </div>
      <div class="col-md-3">
        <a class="btn btn-success  fas fa-calendar-plus"> total:{{$count}}</a>
      </div>
      <div class="col-md-3">
        <a class="btn btn-danger fas fa-calendar-times"> Pendientes:{{$count}}</a>
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
            <th scope="col">Estado</th>
            <th scope="col"> Acciones</th>

          
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
                 @if ($reservation->active==1)
                     <p>Proceso</p>
                 @else
                 <p>Finalizada</p>
                 @endif
               </td>
               <td>
                      <form action="{{route('destroy_reservations',$reservation->id)}}" method="post">
                        @csrf
                        <a href="{{route('update_status',$reservation->id)}}" class="fas fa-check  btn-success btn-sm "></a>

                        @method('delete')
                        <button class="btn btn-danger btn-sm fas fa-trash-alt cursor-pointer" onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')" value="Borrar"></button>
                 
                      </form>
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