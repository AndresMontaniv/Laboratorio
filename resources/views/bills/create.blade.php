@extends('adminlte::page')

@section('title', 'Laboratorio')

@section('content_header')
    <h1>Registrar Factura</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{route('bills.store')}}" novalidate >

            @csrf


                   <div>
                    <label for="name">Seleccione un paciente</label>
                    <select name="user_id" id="select-user_ides" class="form-control" >
                                <option value=0>Seleccione un paciente</option>
                                    @foreach($pacientes as $paciente)
                                        <option value="{{$paciente->id}}">
                                            {{$paciente->username}} {{$paciente->name}}
                                        </option>
                                        @endforeach
                    </select>
                     
                    @error('user_id')
                        <small>*{{$message}}</small>
                        <br><br>
                    @enderror
                    <br>
                </div>

      <label for="nit">NIT:</label>
        <input type="number"  name="nit"  class="focus border-primary  form-control">

        @error('nit')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <br>        

        <button  class="btn btn-danger btn-sm" type="submit">Registrar</button>
        </form>

    </div>
</div>
@stop


