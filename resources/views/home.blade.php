@extends('adminlte::page')
@section('title', 'Laboratorio')
 
@section('content')
<div class="container">
    
    <div>
        @can('admin')
            <h1>Hola soy admin</h1>
            <br>
        @endcan
        @can('nurse')
            <h1>Hola soy personal medico</h1>
            <br>
        @endcan
        @can('patient')
            <h1>Hola soy paciente</h1>
            <br>
        @endcan
    </div>
</div>
@endsection
