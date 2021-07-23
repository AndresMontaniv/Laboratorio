@extends('adminlte::page')

@section('title', 'Laboratorio')

@section('content_header')
    <h1> Listar Laboratorios</h1>
@stop

@section('content')
<div class="card">
     
   
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-striped" id="laboratorios" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Logo</th>
                    <th scope="col">Laboratorio </th>
                    <th scope="col">estado</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($laboratories as $laboratory)
                    <tr>
                        <td>{{$laboratory->id}}</td>
                        <td>
                            @if ($laboratory->imagen == null)
                            <img src="{{asset('./Icons/lab.png')}}" alt="avatar" width="50" height="50">  
                            @else
                            <img src="{{ asset('/storage/images/'. $laboratory->imagen )}}" alt="avatar" width="60" height="60">
                            @endif
                        </td>
                        <td>{{$laboratory->name}}</td>
                        @if (($laboratory->status == 1))
                        <td>
                            <a href="{{route('laboratories.desactive', $laboratory->id)}}" class="btn btn-success  cursor-pointer"><i class="fas fa-power-off"></i><a> 
                        </td>
                        @else
                        <td>
                            <a href="{{route('laboratories.active', $laboratory->id)}}" class="btn btn-danger cursor-pointer"><i class="fas fa-power-off"></i><a> 
                        </td>
                        @endif
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
         $('#laboratorios').DataTable();
        } );
    </script>
@stop