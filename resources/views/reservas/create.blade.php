@extends('adminlte::page')

@section('title', 'Laboratorio')

@section('content_header')
    <h1>Registrar Reserva</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">

        <div class="card">
            <div class="card-header">
                <div class="p-3">
                  <h5>Buscar Reservas por fechas</h5>
                  <form method="get" action="" novalidate>
                    <input type="date" name="fechaElegir">
                      <button class="btn btn-primary btn-sm" type="submit">Ver por fecha</button>
                   </form>
                </div>
            </div>
        </div>
        {{--<form method="post" action="{{route('reservas.store')}}" novalidate >
            @csrf
        
        </form>--}}

    </div>
</div>
@stop


