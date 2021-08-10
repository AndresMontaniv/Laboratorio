@extends('adminlte::page')

@section('title', 'Editar Atributo')

@section('content_header')
    <h1 class="text-capitalize">Editar Atributo de Prueba</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{url('/field/'.$field->id)}}"  novalidate  enctype="multipart/form-data">

            @csrf
            @method('PATCH')

            <h5 class="text-capitalize">Nombre</h5>
            <input type="text"  name="name" value="{{$field->name}}" class="focus border-primary  form-control">
            
            <br>
            <h5 class="text-capitalize">Minimo Femenino</h5>
            <input type="number"  name="femaleMinParam" value="{{$field->femaleMinParam}}" class="focus border-primary  form-control">
            
            <br>
            <h5 class="text-capitalize">Maximo Femenino</h5>
            <input type="number"  name="femaleMaxParam" value="{{$field->femaleMaxParam}}" class="focus border-primary  form-control">
            <br>
            <h5 class="text-capitalize">Minimo Masculino</h5>
            <input type="number"  name="maleMinParam" value="{{$field->maleMinParam}}" class="focus border-primary  form-control">
            
            <br>
            <h5 class="text-capitalize">Maximo Masculino</h5>
            <input type="number"  name="maleMaxParam" value="{{$field->maleMaxParam}}" class="focus border-primary  form-control">
            
            <br>
            <br>
            <br>

            <button  class="btn btn-danger btn-sm" type="submit">Guardar</button>
            <a href="{{url('/field/')}}"class="btn btn-warning text-white btn-sm">Volver</a>
        </form>

    </div>
</div>
@stop




@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    
@stop