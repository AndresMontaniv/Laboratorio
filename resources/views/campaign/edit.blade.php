@extends('adminlte::page')

@section('title', 'Laboratorio')

@section('content_header')
    <h1>Editar campaña</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        <form action="{{route('campaign.update',$campaign->id)}}" method="post" enctype="multipart/form-data" >
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="title">Titulo</label>
                    <input type="text" name="title" class="form-control" value="{{$campaign->title}}" id="title">
                    @error('title')
                        <small>*{{$message}}</small>
                        <br><br>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="body">Cuerpo</label>
                    <input type="text" name="body" class="form-control" value="{{$campaign->body}}" id="body" >
                    @error('body')
                        <small>*{{$message}}</small>
                        <br><br>
                    @enderror
                </div>
            </div>

            <div>
                <label for="initialDate">Fecha inicial</label>
                    <input type="date" name="initialDate" class="form-control" value="{{$campaign->initialDate}}" id="initialDate">
                    @error('initialDate')
                        <small>*{{$message}}</small>
                        <br><br>
                    @enderror
            </div>

            <div>
                <label for="expiration">Fecha de expiracion</label>
                    <input type="date" name="expiration" class="form-control" value="{{$campaign->expiration}}" id="expiration">
                    @error('expiration')
                        <small>*{{$message}}</small>
                        <br><br>
                    @enderror
            </div>

            <div>
                <label for="discount">descuento</label>
                    <input type="text" name="discount" class="form-control" value="{{$campaign->discount}}" id="discount">
                    @error('discount')
                        <small>*{{$message}}</small>
                        <br><br>
                    @enderror
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
