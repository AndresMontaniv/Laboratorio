@extends('adminlte::page')

@section('title', 'Laboratorio')


@section('content_header')
    <h1>Resultados de la Busqueda</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="resultados" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Nombre de usuario</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">CI</th>
                        <th scope="col">Birthday</th>
                        <th scope="col">Laboratorio</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->lastname}}</td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->ci}}</td>
                            <td>{{$user->birthday}}</td>
                            <td>{{DB::table('laboratories')->where('id',$user->laboratory_id)->value('name')}}</td>

                            {{-- <td>
                               <form action="{{route('users.destroy', $user->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="{{route('users.edit', $user->id)}}" class="btn btn-primary btn-sm fas fa-edit  cursor-pointer"><a>

                                    <button class="btn btn-danger btn-sm fas fa-trash-alt" onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')" value="Borrar"></button> 

                                    <a href="{{route('users.show', $user->id)}}" class="btn btn-success btn-sm fas fa-eye  cursor-pointer"><a> 

                                    
                                </form>
                            </td>--}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <br><br>
            <a href="{{url('/user/')}}"class="btn btn-primary text-white btn-lg btn-block">VOLVER A USERS</a>
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
        $('#resultados').DataTable();
        } );
    </script> 
@stop

