@extends('adminlte::page')

@section('title', 'Laboratorio')

@section('content_header')
    <h1> Editar Periodo</h1>
@stop

@section('content')
<form method="post" action="{{route('periods.update',$periodo->id)}}">

    @csrf
    @method('PATCH')


    <label for="inicio">Fecha Inicio</label>

         <input type="time"  name="inicio" value="{{$periodo->inicio->toTimeString()}}" class="focus border-primary  form-control" >

         @error('inicio')
         <span class="text-danger">{{ $message }}</span>
        @enderror

        <label for="fin">Fecha Fin</label>
         <input type="time"  name="fin" value="{{$periodo->fin->toTimeString()}}" class="focus border-primary  form-control" >

         @error('fin')
            <span class="text-danger">{{$message}}</span>
        @enderror

        

        <br>
    <button type="submit"  class="btn btn-danger btn-sm">Guardar</button>

</form>
@stop

