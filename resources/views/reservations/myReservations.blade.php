@extends('layouts.app')
@section('content')
<br>
<br>
<div class="container">
    @if (isset($reservations))
        <table class="table table-striped">
            <thead>
                <th>Fecha </th>
                <th>SALA: </th>
                <th>Inicio </th>
                <th>Fin</th>
                <th>Borrar</th>
            </thead>
            <tbody>
                @foreach ($reservations as $reservation)
                <tr>
                    <td>{{$reservation->date->diffForHumans()}}</td>
                    <td>{{$reservation->room->name}}</td>
                    <td>{{$reservation->period->begin->toTimeString()}}</td>
                    <td>{{$reservation->period->end->toTimeString()}}</td>
                    <td>
                        <a href="{{route('reservation.desactivate',$reservation->id)}}"><button type="button" class="btn btn-danger">Borrar</button></a>
                    </td>
                </tr> 
                @endforeach
            </tbody>
        </table> 
    @endif
</div>              
<br>
@endsection