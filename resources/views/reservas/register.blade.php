@extends('adminlte::page')
@section('title', 'Laboratorio')
 
@section('content')

<div class="card ">
    <div class="card-body ">
        <form method="post" action="{{route('store_reservation')}}" novalidate >
            @csrf
            <label for="description">Descripcion</label>

        <input type="text"  name="description" class="focus border-primary  form-control " >

         @error('description')
         <span class="text-danger">{{$message}}</span>
         @enderror

         <label for="room_id">Seleccionar Sala</label>

         <select name="room_id" id="select-room" class="form-control" onchange="habilitar()" >
             <option value="nulo">Salas Disponibles</option>
                 @foreach ($room as $rooms)
                     <option value="{{$rooms->id}}">
                         {{$rooms->name}}
                     </option>
                 @endforeach
         </select>
         @error('room_id')
         <span class="text-danger">{{$message}}</span>
         @enderror
        <input type="hidden" name="period_id" value="{{$period}}">
        <input type="hidden" name="date" value="{{$date}}">
        <br>
        <button  class="btn btn-danger btn-sm" type="submit">Registrar</button>
        </form>

    </div>
</div>


@endsection