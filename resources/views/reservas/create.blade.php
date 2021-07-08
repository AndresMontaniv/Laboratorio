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
                  <label for="">Fecha a Reservar</label>

                  <form method="POST" action="{{route('show_periods')}}" novalidate>
                    @csrf
                    <input id="date" type="date"  class=" @error('date') is-invalid @enderror" name="date" >
                    <button class="btn btn-primary btn-sm" type="submit">  {{ __('Buscar') }}</button>
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


