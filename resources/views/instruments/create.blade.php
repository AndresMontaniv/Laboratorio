@extends('adminlte::page')

@section('title', 'Laboratorio')

@section('content_header')
    <h1>Registrar Instrumento</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">

            <form action="{{route('instruments.store')}}" method="post" novalidate  enctype="multipart/form-data">
                @csrf
                   
                       <div class="form-group ">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" class="form-control" value="{{old('name')}}">
                        @error('name')
                            <small>*{{$message}}</small>
                            <br><br>
                        @enderror
                        
                       </div>
                      

                <button  class="btn btn-danger btn-sm" type="submit">Registrar</button>
              </form>

    </div>
</div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

