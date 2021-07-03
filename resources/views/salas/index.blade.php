@extends('adminlte::page')

@section('title', 'Laboratorio')

@section('content_header')
    <h1> Listar Salas</h1>
@stop

@section('content')


<div class="card">
 
  <div class="card-header">
    <a href="{{route('rooms.create')}}" class="btn btn-primary btb-sm">Registrar Sala</a>
</div>

        
  </div>
<div class="card">
  <div class="card-body">
      <table class="table table-striped" id="salas" >

        <thead>

          <tr>
            <th scope="col">Id</th>
            <th scope="col">Descripcion</th>     
            <th></th> 
            <th scope="col">Estado</th>
            <th scope="col"> Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($sala as $salas)

            <tr>
                <td>{{$salas->id}}</td>
                <td>{{$salas->nombre}}</td>
                <td>
                    @if ($salas->estado==='A')
                     <th><button class="btn btn-warning btn-sm" >Activo</button></th>
                         @else
                         <th><button class="btn btn-success btn-sm" >Inactivo</button></th> 
                     @endif
                    
                 </td>
                
               
               
             
              
             
          
              <td>
                <form action="{{route('rooms.destroy',$salas->id)}}" method="post">
                  @csrf
                  @method('delete')
                
          
                 {{-- <a class="btn btn-primary btn-sm fas fa-eye cursor-pointer" href="{{route('salas.show',$salas->id)}}"> </a>--}}
                  
                    
                  <a class="btn btn-success btn-sm fas fa-edit  cursor-pointer" href="{{route('rooms.edit',$salas->id)}}"></a>
                
                
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
         $('#salas').DataTable();
        } );
    </script>
@stop