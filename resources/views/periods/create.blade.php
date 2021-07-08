@extends('adminlte::page')

@section('title', 'Laboratorio')

@section('content_header')
    <h1>Registrar Periodo</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{route('periods.store')}}" novalidate >
            @csrf
       
        <label for="inicio">Fecha Inicio</label>

        <input type="time"  name="inicio" class="focus border-primary  form-control " >

         @error('inicio')
         <span class="text-danger">{{$message}}</span>
         @enderror
          
         <label for="fin">Fecha Fin</label>

        <input type="time"  name="fin" class="focus border-primary  form-control " >

         @error('fin')
         <span class="text-danger">{{$message}}</span>
         @enderror



        <br>
        <button  class="btn btn-danger btn-sm" type="submit">Registrar</button>
        </form>

    </div>
</div>
@stop
