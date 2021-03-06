@extends('adminlte::page')

@section('title', 'Laboratorio')


@section('content_header')
    <h1>Usuarios</h1>
@stop

@section('content')
    <div class="card">
     
        <div class="card-header">
            
            <div class="row">
                <div class="col">
                    <a href="{{route('users.create')}}" class="btn btn-primary btb-sm">Crear Usuario</a>
  
                </div>
                <div class="col">
                    <a href="{{route('exceluser')}}" class="btn btn-success btb-sm ">Exportar Excel</a>
                </div>
                <div class="col">
                    <a href="{{route('pdfuser')}}" class="btn btn-danger btb-sm  text-white">Exportar PDF</a>
                </div>
                <div class="col"> 
                    <a href="{{url('/userbuscador/create')}}" class="btn btn-warning text-white btb-sm mx-3">Query Builder</a>
                </div> 
                <div class="col"> 
                    <a href="{{route('Usergrafica')}}" class="btn btn-primary text-white btb-sm ">Grafica Reporte</a>
                </div> 
            </div>
        </div>
     
       
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="usuarios" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre de usuario</th>
                        {{-- @if (Auth::user()->laboratory_id == null)
                        <th scope="col">Laboratorio</th>
                        @endif --}}
                        <th scope="col">Nombre </th>
                        <th scope="col">Email</th>
                        <th scope="col">Especialidades</th>
                        <th scope="col">Acciones</th>
                        <th scope="col">Permisos</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            
                            @if (App\Models\User::isNurse($user))
                            <td>
                                <a href="{{route('userSpeciality.index', $user->id)}}" class="btn btn-success cursor-pointer"><i class="fas fa-briefcase-medical"></i><a> 
                            </td>  
                            @else
                            <td>No es parte del personal medico</td>    
                            @endif                   
                            <td>
                               <form action="{{route('users.destroy', $user->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="{{route('users.edit', $user->id)}}" class="btn btn-primary btn-sm fas fa-edit  cursor-pointer"><a>
       
                                    <button class="btn btn-danger btn-sm fas fa-trash-alt" onclick="return confirm('??ESTA SEGURO DE  BORRAR?')" value="Borrar"></button> 
                                    
                                    <a href="{{route('users.show', $user->id)}}" class="btn btn-success btn-sm fas fa-eye  cursor-pointer"><a>                   
                                </form>
                            </td>
                            <td>
                                <a href="{{route('permissions.index', $user->id)}}" class="btn btn-warning btn-sm cursor-pointer"><i class="fas fa-key"></i><a> 
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
        $('#usuarios').DataTable();
        } );
    </script> 
@stop

