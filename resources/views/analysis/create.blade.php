@extends('adminlte::page')

@section('title', 'Registrar Analisis')

@section('content_header')
    <h1 class="text-capitalize">Registrar analisis</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{url('/analysis')}}" novalidate  enctype="multipart/form-data">

            @csrf
            <h5 class="text-capitalize">Paciente:</h5>
            <select name="patient_id" id="select-paciente" class="form-control" onchange="habilitar()" >
                <option value="nulo">Seleccione un Paciente</option>
                    @foreach ($patients as $patient)
                        <option value="{{$patient->id}}">
                            {{$patient->name}}
                        </option>
                    @endforeach
            </select>

            <br>
            <h5 class="text-capitalize">Enfermera:</h5>
            <select name="enfermera_id" id="select-enfermera" class="form-control" onchange="habilitar()" >
                <option value="nulo">Seleccione una Enfermera</option>
                    @foreach ($nurses as $nurse)
                        <option value="{{$nurse->id}}">
                            {{$nurse->name}}
                        </option>
                    @endforeach
            </select>
            <br>

            <h5 class="text-capitalize">Prueba:</h5>
            <select name="prueba_id" id="select-prueba" class="form-control" onchange="habilitar()" >
                <option value="nulo">Seleccione una Prueba</option>
                    @foreach ($proofs as $proof)
                        <option value="{{$proof->id}}">
                            {{$proof->name}}
                        </option>
                    @endforeach
            </select>
            <br>
            
            
            <br>
            <br>

            <button  class="btn btn-danger btn-sm" type="submit">Registrar</button>
            <a href="{{url('/analysis/')}}"class="btn btn-warning text-white btn-sm">Volver</a>
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