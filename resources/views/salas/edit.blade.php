@extends('adminlte::page')

@section('title', 'Laboratorio')

@section('content_header')
    <h1> Editar sala</h1>
@stop

@section('content')
<form method="post" action="{{route('rooms.update',$sala->id)}}">

    @csrf
    @method('PATCH')


    <label for="name">Descripcion</label>

         <input type="text"  name="name" value="{{$sala->inicio}}" class="focus border-primary  form-control" >

         @error('name')
         <span class="text-danger">{{ $message }}</span>
        @enderror

           
        <div class="form-group">
            <label for="status">Estado</label>
            <select name="status" id=""  class="focus border-primary  form-control">
                <option value=1>Activo</option>
                <option value=2>Inactivo</option>
                </select>
         </div>

        

        <br>
    <button type="submit"  class="btn btn-danger btn-sm">Guardar</button>

</form>
@stop

