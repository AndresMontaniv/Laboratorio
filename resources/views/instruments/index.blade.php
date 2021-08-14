@extends('adminlte::page')

@section('title', 'Laboratorio')

@section('content_header')
    <h1>Listar Instrumento</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{route('instruments.create')}}" class="btn btn-primary btb-sm">Registrar</a>

    </div>
</div>
<div class="card">
    <div class="card-body">
        <table class="table table-striped" id="instruments" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($instruments as $instrument)
                     
               
                    <tr>
                        <td>{{$instrument->id}}</td>
                        <td>{{$instrument->name}}</td> 
                                                  
                       
                        <td >
                            <form action="{{route('instruments.destroy', $instrument->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <a href="{{route('instruments.edit', $instrument->id)}}" class="btn btn-primary btn-sm fas fa-edit  cursor-pointer"></a>

                                <button class="btn btn-danger btn-sm fas fa-trash-alt  cursor-pointer" onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')" value="Borrar"></button>                                    

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
         $('#instruments').DataTable();
        } );
    </script> 
    @stop