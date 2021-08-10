@extends('layouts.app')
@section('content')
<br>
<div class="container">
    <div class="card-body">     
            <ul class="list-group list-group-flush "> 
                @if (Auth::user()->photo != null)
                <li class="list-group-item" style="text-align: center">
                    <img src="{{ asset('images/'.Auth::user()->photo )}}" alt="avatar" width="150" height="150">
                </li>
                @endif
                <li class="list-group-item" style="text-align: center">{{"Nombre: ".Auth::user()->name}}</li>
                <li class="list-group-item" style="text-align: center">{{"Usuario: ".Auth::user()->username}}</li>
                <li class="list-group-item" style="text-align: center">{{"Telefono: ".Auth::user()->phone}}</li>
                <li class="list-group-item" style="text-align: center">{{"Email: ".Auth::user()->email}}</li>
            </ul>
    </div>
    <a href="{{route('notification.index',Auth::user()->id)}}"><button type="button" class="btn btn-info  btn-lg btn-block"><b>Mis notificationes</b></button></a>
</div>  
<br>


@if((isset($notifications)))

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ "Notificaciones proximas"}}</div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <th>detalle</th>
                                    <th>Fecha</th>
                                    <th>Tipo</th>
                                </thead>
                                <tbody>
                                    @foreach ($notifications as $notification)
                                    <tr>
                                        <td>{{$notification->detail}}</td>
                                        <td>{{$notification->date->toFormattedDateString()}}</td>
                                        <td>
                                            @if ($notification->analysis_id != null)
                                                {{"analysis"}}
                                            @else
                                                {{"reserva"}}
                                            @endif
                                        </td>
                                    </tr> 
                                    @endforeach
                                </tbody>
                            </table>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection