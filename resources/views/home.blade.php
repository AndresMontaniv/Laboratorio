@extends('adminlte::page')
@section('title', 'Laboratorio')
 
@section('content')
<div class="card mb-3 mt-5 shadow border-5">
    <img src="vendor/adminlte/dist/img/titulo.png" class="card-img-top" alt="...">
    <div class="card-body border-3 bg-gradient-red" >
        @can('admin')
        <h6>Administrador</h6>
        @endcan
        @can('nurse')
        <h6>Médico</h6>
        @endcan
        @can('patient')
        <h6>Paciente</h6>
        @endcan
    </div>
</div>
@endsection
