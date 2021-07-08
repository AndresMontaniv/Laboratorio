@extends('adminlte::page')

@section('title', 'Laboratorio')

@section('content_header')
    <h1> Listar Bitacora</h1>
@stop

@section('content')


<div class="card">
  
        
  </div>
<div class="card">
  <div class="card-body">
      <table class="table table-striped" id="binnacles" >

        <thead>

          <tr>
            <th scope="col">Id</th>
            <th scope="col">Usuario</th>
            <th scope="col">Accion</th>  
            <th scope="col">Entidad</th>
            <th scope="col">Tabla</th>      
            <th scope="col">ip</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($binnacles as $binnacle)
            <tr>
                <td>{{$binnacle->id}}</td>
                <td>{{$binnacle->user->name}}</td>
                <td>{{$binnacle->action}}</td>
                <td>{{$binnacle->entity}}</td>
                <td>{{$binnacle->table}}</td>
                <td>{{$binnacle->ip}}</td>
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
         $('#binnacles').DataTable();
        } );
    </script>
@stop