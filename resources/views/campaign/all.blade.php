@extends('adminlte::page')

@section('title', 'Laboratorio')

@section('content_header')
    <h1>Campañas</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{route('campaign.create')}}" class="btn btn-primary btb-sm">Crear Campaña</a>

    </div>
</div>
<div class="card">
    <div class="card-body">
        <table class="table table-striped" id="campaigns" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Cuerpo</th>
                    <th scope="col">expiracion</th>
                    <th scope="col">Fecha inicial</th>
                    <th scope="col">descuento</th>
                    <th scope="col">estado</th>
                    <th scope="col">editar</th>
                    <th scope="col">pruebas</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($campaigns as $campaign)            
                    <tr>
                        <td>{{$campaign->id}}</td>
                        <td>{{$campaign->title}}</td>     
                        <td>{{$campaign->body}}</td>     
                        <td>{{$campaign->expiration->toFormattedDateString()}}</td>     
                        <td>{{$campaign->initialDate->toFormattedDateString()}}</td>      
                        <td>{{$campaign->discount." Bs"}}</td>                            
                            @if ($campaign->status == 1)
                            <td>
                            <a href="{{route('campaign.desactive', $campaign->id)}}" class="btn btn-success"><img src="{{asset('./Icons/switch-on.png')}}" alt="on" width="30" height="30"><a>
                            </td>
                            @else
                            <td>
                            <a href="{{route('campaign.active', $campaign->id)}}" class="btn btn-danger"><img src="{{asset('./Icons/switch-off.png')}}" alt="on" width="30" height="30"><a>
                            </td>
                            @endif
                            <td>
                            <a href="{{route('campaign.edit', $campaign->id)}}" class="btn btn-info btn-sm fas fa-edit  cursor-pointer"></a>
                            </td>
                            <td>
                                <a href="{{route('testCampaign.index', $campaign->id)}}" class="btn btn-warning btn-sm ">Prueba</a>
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
         $('#campaigns').DataTable();
        } );
    </script> 
@stop