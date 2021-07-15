@extends('adminlte::page')

@section('title', 'Laboratorio')

@section('content_header')
    <h1>Datos de Usuario</h1>
@stop

@section('content')


<div class="col-md-4">
  <div class="card card-user">
    <div class="card-body">
      <p class="card-text">
        <div class="author">
          <a href="#" class="d-flex">
            <img src="{{ asset('/vendor/adminlte/dist/img/usuario.png') }}" alt="image" class="avatar">
          </a>
          
          <h5 class="font-weight-bold ">{{$user->name}}</h5> 
         
          <p>
             <label for="">User Name:</label> {{$user->username}}<br>
             <label for="">Ci:</label> {{$user->ci}}<br>
             <label for="">Teléfono:</label>{{$user->phone}}</h2> <br>
             <label for="">Email:</label> {{$user->email}} <br>
          </p>
       
          </p>
        </div>
     </div>
    <div class="card-footer">
      
        <a class="btn btn-warning btn-sm" href="{{route('users.index')}}"> Volver</a>
    
    </div>
  </div>
</div><!--end card user 2-->


@stop