@extends('adminlte::page')

@section('title', 'Laboratorio')

@section('content_header')
    <h1> Listar Reservas</h1>
@stop

@section('content')


<div class="card">
  <div class="card-header">
    <a href="{{route('reservations.create')}}" class="btn btn-primary btb-sm">Registrar Reserva</a>
</div>
        
  </div>
<div class="card">
  <div class="card-body">
      <table class="table table-striped" id="reservas" >

        <thead>

          <tr>
            <th scope="col">Id</th>
            <th scope="col">Fecha Inicio</th>
            
            <th scope="col"> Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($reserva as $reservas)

            <tr>
                <td>{{$reservas->id}}</td>
                <td>{{$reservas->inicio}}</td>
            
               
                             
             
          
              <td>
              {{--  <form action="{{route('reservas.destroy',$reservas->id)}}" method="post">
                  @csrf
                  @method('delete')
                
          
                 <a class="btn btn-primary btn-sm fas fa-eye cursor-pointer" href="{{route('reservas.show',$reservas->id)}}"> </a>-
                  
                    
                  <a class="btn btn-success btn-sm fas fa-edit  cursor-pointer" href="{{route('reservas.edit',$reservas->id)}}"></a>
                
                
                  <button class="btn btn-danger btn-sm fas fa-trash-alt cursor-pointer" onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')" value="Borrar"></button>
                 
                </form> --}}
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