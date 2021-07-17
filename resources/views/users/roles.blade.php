@extends('adminlte::page')

@section('title', 'Laboratorio')


@section('content_header')
    <h1>Permisos de usuario</h1>
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
    <br>

    <div class="container">
        <br>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><h2>permisos</h2></li>
        </ul>
        <br>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
               Roles
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            @foreach ($roles as $rol)
            <li><a class="dropdown-item" href="{{route('permissions.setPermission',[$usuario->id, $rol->id])}}">{{ $rol->name}}</a></li>
            @endforeach
            </ul>
        </div>    
        <table class="table table-striped">
            <thead>
                  <th>Rol </th>
                  <th>creado: </th>
                  <th>actualizado: </th>
                  <th>Opciones</th> 
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                   <tr>
                        <td>{{$permission->role->name}}</td>   
                        <td>{{$permission->created_at}}</td>
                        <td>{{$permission->updated_at}}</td>          
                        <td>
                            @if ($permission->status==1)
                            <a href="{{route('permissions.desactivate', $permission->id)}}"><button type="button" class="btn btn-warning">desactivar</button></a>
                            @else
                            <a href="{{route('permissions.activate', $permission->id)}}"><button type="button" class="btn btn-success">activar</button></a>
                            @endif                                           
                        </td>                 
                   </tr> 
                @endforeach
            </tbody>
        </table>
        {{-- <div class="table table-striped">{{inserto()}}</div> --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </div>

@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
@stop
