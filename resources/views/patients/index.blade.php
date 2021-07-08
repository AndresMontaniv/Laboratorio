@extends('layouts.app')
@section('content')
<br>
<div class="container">
    <div class="card-body">     
            <ul class="list-group list-group-flush "> 
                @if (Auth::user()->photo != null)
                <li class="list-group-item" style="text-align: center">
                    <img src="{{ asset('/storage/images/'.Auth::user()->photo )}}" alt="avatar" width="150" height="150">
                </li>
                @endif
                <li class="list-group-item" style="text-align: center">{{"Nombre: ".Auth::user()->name}}</li>
                <li class="list-group-item" style="text-align: center">{{"Usuario: ".Auth::user()->username}}</li>
                <li class="list-group-item" style="text-align: center">{{"Telefono: ".Auth::user()->phone}}</li>
                <li class="list-group-item" style="text-align: center">{{"Email: ".Auth::user()->email}}</li>
            </ul>
    </div>
</div>                
<br>
@endsection