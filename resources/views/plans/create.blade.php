@extends('adminlte::page')

@section('title', 'Consultorio-Sonrie')

@section('content_header')
    <h1>Crear nuevo plan</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        <form action="{{route('plans.store')}}" method="post" enctype="multipart/form-data" >
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="price">Precio</label>
                    <input type="number" name="price" class="form-control" value="{{old('price')}}" id="price">
                    @error('price')
                        <small>*{{$message}}</small>
                        <br><br>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="activar-contraseña">Plan</label>
                    <input type="text" name="name" class="form-control" value="{{old('name')}}" id="name" >
                    @error('name')
                        <small>*{{$message}}</small>
                        <br><br>
                    @enderror
                </div>
            </div>

            <div>
                <label for="months">Meses</label>
                    <input type="number" name="months" class="form-control" value="{{old('months')}}" id="phone">
                    @error('months')
                        <small>*{{$message}}</small>
                        <br><br>
                    @enderror
            </div>
             
            <div>
                <label for="description">Descripcion</label>
                    <input type="text" name="description" class="form-control" value="{{old('description')}}" id="description">
                    @error('description')
                        <small>*{{$message}}</small>
                        <br><br>
                    @enderror
            </div>

            <div>
                <label for="image">Imagen</label>
                <input id="image" type="file" accept="image/*" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" >
                @error('image')
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
