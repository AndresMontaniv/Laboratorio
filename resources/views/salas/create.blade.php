@extends('adminlte::page')

@section('title', 'Laboratorio')

@section('content_header')
    <h1>Registrar Periodo</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{route('rooms.store')}}" novalidate >
            @csrf
        <h5>Descripcion:</h5>

        <input type="text"  name="nombre" class="focus border-primary  form-control " >

         @error('nombre')
         <span class="text-danger">{{$message}}</span>
         @enderror
          
        
         <div class="form-group">
            <h5>Estado:</h5>
            <select name="estado" id=""  class="focus border-primary  form-control">
                <option value="A">Activo</option>
                <option value="I">Inactivo</option>
                </select>
         </div>



        <br>
        <button  class="btn btn-danger btn-sm" type="submit">Registrar</button>
        </form>

    </div>
</div>
@stop
