@extends('adminlte::page')

@section('title', 'Laboratorio')

@section('content_header')
    <h1> Editar sala</h1>
@stop

@section('content')
<form method="post" action="{{route('rooms.update',$sala->id)}}">

    @csrf
    @method('PATCH')


        <h5>Descripcion:</h5>

         <input type="text"  name="nombre" value="{{$sala->inicio}}" class="focus border-primary  form-control" >

         @error('nombre')
         <span class="text-danger">{{ $message }}</span>
        @enderror

           
        <div class="form-group">
            <h5>Estado:</h5>
            <select name="estado" id=""  class="focus border-primary  form-control">
                <option value="A">Activo</option>
                <option value="I">Inactivo</option>
                </select>
         </div>

        

        <br>
    <button type="submit"  class="btn btn-danger btn-sm">Guardar</button>

</form>
@stop

