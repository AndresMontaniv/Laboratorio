@extends('adminlte::page')

@section('title', 'Laboratorio')

@section('content_header')
<div class="container">
  <h1>Datos de Usuario</h1>
</div>
@stop

@section('content')


<div class="container">
  <div class="card card-user">
    <div class="card-body">
      <p class="card-text">
        <div class="author">
          <a href="#" class="d-flex">
            @if ($user->photo != null)
            <img src="{{ asset('/storage/images/'.$user->photo )}}" alt="avatar" width="150" height="150">    
            @else
            <img src="{{asset('./Icons/user.png')}}" alt="avatar" width="150" height="150">
            @endif
          </a>          
          <br><br>
          <h3 class="text-sm"> User Name: <b>{{$user->name}}</b></h3>  <br>
        <h2 class="text-sm"> User Name:{{$user->username}}</h2>  <br>
        
         <h2 class="text-sm">Teléfono: {{$user->phone}}</h2> <br>
           
           <h2 class="text-sm">Email:  {{$user->email}}</h2> <br>
          </p>
        </div>
     </div>
    <div class="card-footer">
      
        <a class="btn btn-warning btn-sm" href="{{route('users.index')}}"> Volver</a>
    
    </div>
  </div>
</div><!--end card user 2-->


@stop