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
     
        <label for="name">Descripcion</label>

        <input type="text"  name="name" class="focus border-primary  form-control " >

         @error('name')
         <span class="text-danger">{{$message}}</span>
         @enderror
          

        <br>
        <button  class="btn btn-danger btn-sm" type="submit">Registrar</button>
        </form>

    </div>
</div>
@stop
