@extends('adminlte::page')

@section('title', 'Laboratorio')

@section('content_header')
    <h1> Editar Periodo</h1>
@stop

@section('content')
<form method="post" action="{{route('periods.update',$periodo->id)}}">

    @csrf
    @method('PATCH')


        <h5>Fecha Inicio:</h5>

         <input type="time"  name="inicio" value="{{$periodo->inicio}}" class="focus border-primary  form-control" >

         @error('inicio')
         <span class="text-danger">{{ $message }}</span>
        @enderror

        <h5>Fecha Fin:</h5>
         <input type="time"  name="fin" value="{{$periodo->fin}}" class="focus border-primary  form-control" >

         @error('fin')
            <span class="text-danger">{{$message}}</span>
        @enderror

        

        <br>
    <button type="submit"  class="btn btn-danger btn-sm">Guardar</button>

</form>
@stop

