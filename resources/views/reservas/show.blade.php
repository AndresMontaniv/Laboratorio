@extends('adminlte::page')
@section('title', 'Laboratorio')
 
@section('content')

@if ($dateUsed["error"])
<div class="alert alert-danger">
{{$dateUsed["error"]}}
</div>
@endif

<div class="card text-black ">
    
    <div class="card-header">{{'Horarios Disponibles en : '. $dateUsed["date"]->toFormattedDateString()}}
        <a href="{{route('reservations_create')}}" class="fas fa-arrow-alt-circle-left btn-outline-danger btn-lg toast-top-left" ></a>
           
    </div>
         
       
    <div class="card-body">
<table class="table table-striped">
    <thead>
        <th scope="col">Hora inicio</th>
            <th scope="col">Hora fin</th>       
            <th scope="col">Reservar</th>
    </thead>
    <tbody>
        @foreach ($periods as $period)
           <tr>
               @if($dateUsed["date"]->toFormattedDateString() == $dateUsed["now"]->toFormattedDateString())
                    @if($period->inicio >= $dateUsed["now"])

                    <td>{{$period->inicio->toTimeString()}}</td>
                    <td>{{$period->fin->toTimeString()}}</td>
                    <td> 
                      
                    </td>
                    <td>
                        <a href="{{route('register_reservation',[ 
                        'period' => $period->id, 'date'=> $dateUsed["date"]])}}" class="far fa-calendar-check btn-outline-danger"></a>
                    </td>
                    @endif
               @else
               <td>{{$period->inicio->toTimeString()}}</td>
               <td>{{$period->fin->toTimeString()}}</td>
               <td>
                <a href="{{route('register_reservation',[ 
                'period' => $period->id, 'date'=> $dateUsed["date"]])}}" class="far fa-calendar-check btn-outline-danger"></a>
            </td>
               @endif
           </tr> 
        @endforeach
    </tbody>
</table>
</div>
</div>
</div>
@endsection
