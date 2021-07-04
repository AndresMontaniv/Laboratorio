@extends('adminlte::page')
@section('title', 'Laboratorio')
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
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
