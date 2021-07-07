@extends('adminlte::page')

@section('title', 'Consultorio-Sonrie')

@section('content_header')
    <h1>Listar Roles</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{route('roles.create')}}" class="btn btn-primary btb-sm">Crear Rol</a>

    </div>
</div>
<div class="card">
    <div class="card-body">
        <table class="table table-striped" id="roles" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre de Rol</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($roles as $rol)
                 @if ($rol->id!=4)
                     
               
                    <tr>
                        <td>{{$rol->id}}</td>
                        <td>{{$rol->name}}</td>                            
                        <td >
                            <form action="{{route('roles.destroy', $rol->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <a href="{{route('roles.edit', $rol->id)}}" class="btn btn-primary btn-sm fas fa-edit  cursor-pointer"></a>

                                <button class="btn btn-danger btn-sm fas fa-trash-alt  cursor-pointer" onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')" value="Borrar"></button>                                    

                            </form>
                        </td>-
                        
                    </tr>
                    @endif
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
         $('#roles').DataTable();
        } );
    </script> 
@stop