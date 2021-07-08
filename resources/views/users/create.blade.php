@extends('adminlte::page')

@section('title', 'Laboratorio')

@section('content_header')
    <h1>Registrar Usuario</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">

            <form action="{{route('users.store')}}" method="post" novalidate >
                @csrf
                <label for="name"> Nombre de usuario</label>
                <input type="text" name="name" class="form-control" value="{{old('name')}}">
                @error('name')
                    <small>*{{$message}}</small>
                    <br><br>
                @enderror
                <br>


                <label for="ci">Ci de usuario</label>
                <input type="text" name="ci" class="form-control" value="{{old('ci')}}">
                @error('ci')
                    <small>*{{$message}}</small>
                    <br><br>
                @enderror
                <br>

                <label for="phone">Numero de Teléfono </label>
                <input type="text" name="phone" class="form-control" value="{{old('phone')}}">
                @error('phone')
                    <small>*{{$message}}</small>
                    <br><br>
                @enderror
                <br>    

                <label for="birthday">Fecha Nacimiento</label>
                <input type="date" name="birthday" class="form-control" value="{{old('birthday')}}">
                @error('birthday')
                    <small>*{{$message}}</small>
                    <br><br>
                @enderror
                <br>

                <label for="email">Ingrese email</label>
                <input type="email" name="email" class="form-control" value="{{old('email')}}">
                @error('email')
                    <small>*{{$message}}</small>
                    <br><br>
                @enderror
                <br>

                <label for="password">Ingrese la contraseña</label>
                <input type="password" name="password" class="form-control" value="{{old('password')}}">
                @error('password')
                    <small>*{{$message}}</small>
                    <br><br>
                @enderror
                <br>

                <div>
                    <label for="roles">Seleccione un rol</label>
                    <select name="roles" id="select-roles" class="form-control" >
                        <option value=0>Seleccione un rol</option>
                            @foreach ($roles as $rol)
                                <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                            @endforeach
                    </select>
                    @error('roles')
                        <small>*{{$message}}</small>
                        <br><br>
                    @enderror
                    <br>
                </div>

            

                <button  class="btn btn-danger btn-sm" type="submit">Crear Usuario</button>
            </form>

    </div>
</div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop