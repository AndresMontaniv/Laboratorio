@extends('adminlte::page')

@section('title', 'Laboratorio')

@section('content_header')
    <h1>Editar Usuario</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">

            <form action="{{route('users.update', $user->id)}}" method="post" novalidate >
                @csrf
                @method('put')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Ingrese el nombre de usuario</label>
                        <input type="text" name="name" class="form-control" value="{{old('name', $user->name)}}" id="name">
                        @error('name')
                            <small>*{{$message}}</small>
                            <br><br>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="activar-contraseña">Nueva contraseña</label>
                        <input type="password" name="password" class="form-control" value="{{old('password')}}" id="passwordInput" placeholder="Escriba la nueva contraseña">
                        @error('password')
                            <small>*{{$message}}</small>
                            <br><br>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="phone">Número Teléfono</label>
                        <input type="text" name="phone" class="form-control" value="{{old('phone', $user->phone)}}" id="phone">
                        @error('phone')
                            <small>*{{$message}}</small>
                            <br><br>
                        @enderror
                </div>
                 
                <div>
                    <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" value="{{old('email', $user->email)}}" id="email">
                        @error('email')
                            <small>*{{$message}}</small>
                            <br><br>
                        @enderror
                </div>

                <div>
                    <label for="roles">Selecione un rol</label> 
                    <select name="roles" id="select-roles" class="form-control" >
                        <option value="">Asignar rol</option>
                            @foreach ($roles as $rol)
                                <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                            @endforeach
                    </select>
                    @error('roles')
                        <small>*{{$message}}</small>
                        <br><br>
                    @enderror
                </div>
                <br><br>


                <button  class="btn btn-danger btn-sm" type="submit">Actualizar Usuario</button>
            </form>

    </div>
</div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop