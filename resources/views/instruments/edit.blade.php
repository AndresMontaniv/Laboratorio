@extends('adminlte::page')

@section('title', 'Laboratorio')

@section('content_header')
    <h1>Editar Datos de Instrumentos</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">

            <form action="{{route('instruments.update',$instruments->id)}}" method="post" novalidate enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" class="form-control" value="{{old('name',$instruments->name)}}">
                        @error('name')
                            <small>*{{$message}}</small>
                            <br><br>
                        @enderror
                        <br>  
                    </div>
                </div>


                <button  class="btn btn-danger btn-sm" type="submit">Actualizar </button>
            </form>

    </div>
</div>


@stop


