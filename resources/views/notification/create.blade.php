@extends('adminlte::page')

@section('title', 'Consultorio-Sonrie')

@section('content_header')
    <h1>Crear notificacion</h1>
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
        <form action="{{route('notification.store')}}" method="post" enctype="multipart/form-data" >
            @csrf
            <input type="hidden" name="analysis_id" value="{{$analysis->id}}">

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="date">Fecha de expiracion</label>
                        <input type="date" name="date" class="form-control" value="{{old('date')}}" id="date">
                        @error('date')
                            <small>*{{$message}}</small>
                            <br><br>
                        @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="activar-contraseña">Detalle</label>
                    <input type="text" name="detail" class="form-control" value="{{old('detail')}}" id="detail" >
                    @error('detail')
                        <small>*{{$message}}</small>
                        <br><br>
                    @enderror
                </div>
            </div>

            <br><br>
            <button  class="btn btn-success btn-sm" type="submit">Crear</button>
        </form>
    </div>
    
</div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
@stop
