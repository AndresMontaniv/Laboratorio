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
          
        
         <div class="form-group">
            <label for="status">Estado</label>
            <select name="status" id=""  class="focus border-primary  form-control">
                <option value=1>Activo</option>
                <option value=2>Inactivo</option>
                </select>
         </div>

        <br>
        <button  class="btn btn-danger btn-sm" type="submit">Registrar</button>
        </form>

    </div>
</div>
@stop
