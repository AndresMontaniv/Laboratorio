@extends('layouts.app')
@section('content')
<br>
<div class="container">
    <div class="card-body">     
            <ul class="list-group list-group-flush "> 
                <li class="list-group-item" style="text-align: center">{{"Nombre: ".Auth::user()->name}}</li>
                <li class="list-group-item" style="text-align: center">{{"Usuario: ".Auth::user()->username}}</li>
                <li class="list-group-item" style="text-align: center">{{"Telefono: ".Auth::user()->phone}}</li>
                <li class="list-group-item" style="text-align: center">{{"Email: ".Auth::user()->email}}</li>
            </ul>
    </div>
</div>                
<br>
@endsection