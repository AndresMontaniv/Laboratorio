@extends('adminlte::page')

@section('title', 'Registrar Analisis')

@section('content_header')
    <h1 class="text-capitalize">Registrar analisis</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{url('/analysis/'.$analysis->id)}}"  novalidate  enctype="multipart/form-data">

            @csrf
            @method('PATCH')
            <h5 class="text-capitalize">Paciente:</h5>
            <select name="patient_id" id="select-paciente" class="form-control" onchange="habilitar()" >
                <option value="{{$paciente->id}}">{{$paciente->name}}</option>
                    @foreach ($patients as $patient)
                        <option value="{{$patient->id}}">
                            {{$patient->name}}
                        </option>
                    @endforeach
            </select>

            <br>
            <h5 class="text-capitalize">Enfermera:</h5>
            <select name="nurse_id" id="select-enfermera" class="form-control" onchange="habilitar()" >
                <option value="{{$enfermera->id}}">{{$enfermera->name}}</option>
                    @foreach ($nurses as $nurse)
                        <option value="{{$nurse->id}}">
                            {{$nurse->name}}
                        </option>
                    @endforeach
            </select>
            <br>

            <h5 class="text-capitalize">Prueba:</h5>
            <select name="proof_id" id="select-prueba" class="form-control" onchange="habilitar()" >
                <option value="{{$prueba->id}}">{{$prueba->name}}</option>
                    @foreach ($proofs as $proof)
                        <option value="{{$proof->id}}">
                            {{$proof->name}}
                        </option>
                    @endforeach
            </select>
            <br>
            <h5 class="text-capitalize">Detalle :</h5>
            <input type="text"  name="detail" value="{{$analysis->detail}}" class="focus border-primary  form-control">
            
            <br>
            <h5 class="text-capitalize">Documento :{{$analysis->doc}} </h5>
            <input type="file"  name="doc"  class="focus  border-0 form-control">
            
            <br>

            <h5 class="text-capitalize">Codigo de Descuento</h5>
            <input type="text"  name="code"  class="focus border-primary  form-control">
            
            <br>
            <br>

            <h5 class="text-capitalize">Atributos de Prueba:</h5>
            <div class="form-check mx-2">
                @foreach ($results as $result)

                    <h5 class="text-capitalize">{{DB::table('fields')->where('id',$result->field_id)->value('name')}}</h5>
                    <input type="number"  value="{{$result->resultado}}" name="results[]" class="focus border-primary form-control" >
                    <input type="number"  value="{{$result->id}}" name="campos[]" class="form-check-input" hidden>
                    <br>
                    
                @endforeach
            </div>
            <br>
            @if(sizeof($atributos)>0)
            <h5 class="text-capitalize"> Añadir Atributos de Prueba:</h5>
            @endif
            <div class="form-check mx-2">
                @foreach ($atributos as $atributo)
                    <input type="checkbox"  value="{{$atributo->id}}" name="fields[]" class="form-check-input">
                    <p class="text-capitalize">{{$atributo->name}}</p>
                    
                    
                @endforeach
            </div>
            <br>
            
            <button  class="btn btn-danger btn-sm" type="submit">Guardar</button>
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