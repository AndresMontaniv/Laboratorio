@extends('adminlte::page')

@section('title', 'Laboratorio')

@section('content_header')
    <h1>Crear nuevo campaña</h1>
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
<div class="card">
    <div class="card-body">
        <form action="{{route('campaign.store')}}" method="post" enctype="multipart/form-data" >
            @csrf
            <div class="form-row">

                <div class="form-group col-md-6">
                    <label for="title">Titulo</label>
                    <input type="text" name="title" class="form-control" value="{{old('title')}}" id="title">
                    @error('title')
                        <small>*{{$message}}</small>
                        <br><br>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="body">Cuerpo</label>
                    <input type="text" name="body" class="form-control" value="{{old('body')}}" id="body" >
                    @error('body')
                        <small>*{{$message}}</small>
                        <br><br>
                    @enderror
                </div>
            </div>

            <div>
                <label for="initialDate">Fecha inicial</label>
                    <input type="date" name="initialDate" class="form-control" value="{{old('initialDate')}}" id="initialDate">
                    @error('initialDate')
                        <small>*{{$message}}</small>
                        <br><br>
                    @enderror
            </div>

            <div>
                <label for="expiration">Fecha de expiracion</label>
                    <input type="date" name="expiration" class="form-control" value="{{old('expiration')}}" id="expiration">
                    @error('expiration')
                        <small>*{{$message}}</small>
                        <br><br>
                    @enderror
            </div>

            <div>
                <label for="discount">descuento</label>
                    <input type="text" name="discount" class="form-control" value="{{old('discount')}}" id="discount">
                    @error('discount')
                        <small>*{{$message}}</small>
                        <br><br>
                    @enderror
            </div>
            <br>
              



            <input type="hidden" name="laboratory_id" value="{{Auth::user()->laboratory_id}}">
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
