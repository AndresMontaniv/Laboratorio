@extends('adminlte::page')

@section('title', 'Laboratorio')

@section('content_header')
    <h1>Editar notificacion</h1>
@stop
@section('content')
<div class="card">
    @if ($errors->count() > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="card-body">
        <form action="{{route('notification.update')}}" method="post" enctype="multipart/form-data" >
            @csrf

            <input type="hidden" name="notification_id" value="{{$notification->id}}">

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="date">Fecha de expiracion</label>
                        <input type="date" name="date" class="form-control" value="{{$notification->date->toDateString()}}" id="date">
                        @error('date')
                            <small>*{{$message}}</small>
                            <br><br>
                        @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="activar-contraseña">Detalle</label>
                    <input type="text" name="detail" class="form-control" value="{{$notification->detail}}" id="detail" >
                    @error('detail')
                        <small>*{{$message}}</small>
                        <br><br>
                    @enderror
                </div>
            </div>

            <br><br>
            <button  class="btn btn-info btn-sm" type="submit">Editar</button>
        </form>
    </div>
    <div class="container">
        <div class="alert alert-success">
            <ul>
                <li>{{"Fecha de expiracion: ".$notification->date->diffForHumans()}}</li>
                <li>{{"Detalle: ".$notification->detail}}</li>
            </ul>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
@stop
