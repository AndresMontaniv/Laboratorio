@extends('adminlte::page')

@section('title', 'Consultorio-Sonrie')

@section('content_header')
    <h1>Listar Planes</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{route('plans.create')}}" class="btn btn-primary btb-sm">Crear Plan</a>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <table class="table table-striped" id="roles" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Plan</th>
                    <th scope="col">Logo</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Meses</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($plans as $plan)
                    <tr>
                        <td>{{$plan->id}}</td>
                        <td>{{$plan->name}}</td>   
                        <td>
                        @if ($plan->image)
                        <img src="{{ asset('/storage/images/'.$plan->image )}}" alt="avatar" width="120" height="100">
                        @else
                        <img src="{{asset('./Icons/lab.png')}}" alt="avatar" width="50" height="50"> 
                        @endif
                        </td>
                        <td>{{$plan->price. " BS"}}</td> 
                        <td>{{$plan->months. " Meses"}}</td>   
                        <td>{{($plan->status == 1)? "Activo":"Inactivo"}}</td>
                        <td>{{$plan->description}}</td>
                        <td >
                            <a href="{{route('plans.edit', $plan->id)}}" class="btn btn-primary btn-sm fas fa-edit  cursor-pointer"></a>    
                            @if ($plan->status == 1)
                            <a href="{{route('plans.desactive', $plan->id)}}" class="btn btn-success"><img src="{{asset('./Icons/switch-on.png')}}" alt="on" width="30" height="30"><a>
                            @else
                            <a href="{{route('plans.active', $plan->id)}}" class="btn btn-danger"><img src="{{asset('./Icons/switch-off.png')}}" alt="on" width="30" height="30"><a>
                            @endif
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
         $('#roles').DataTable();
        } );    
    </script> 
@stop