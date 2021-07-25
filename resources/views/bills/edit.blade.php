@extends('adminlte::page')

@section('title', 'Laboratorio')

@section('content_header')
    <h1> Editar Factura</h1>
@stop

@section('content')
<form method="post" action="{{route('bills.update',$bills->id)}}">

    @csrf
    @method('PATCH')

    <div>
        <label for="name">Nombre paciente</label>
        <input type="text" readonly name="user_id"  class="focus border-primary  form-control" value={{DB::table('users')->where('id',$bills->user_id)->value('username')}}>

         
        @error('user_id')
            <small>*{{$message}}</small>
            <br><br>
        @enderror
        <br>
    </div>

<label for="nit">NIT:</label>
<input type="number"  name="nit"  class="focus border-primary  form-control" value="{{old('nit',$bills->nit)}}">

@error('nit')
<span class="text-danger">{{$message}}</span>
@enderror
<br>





    <button type="submit"  class="btn btn-info btn-sm">Guardar</button>

</form>
@stop

