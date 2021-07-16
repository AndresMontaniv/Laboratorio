@extends('layouts.app')
@section('content')
<br>
<div class="container">
    <form method="POST" action="{{route('reservation.searched', Auth::user()->laboratory_id)}}">
        @csrf
        <div class="form-group row">
            <div class="col-md-6">
                <input id="date" type="date"  class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date')}}">
            </div>
                <button type="submit" class="btn btn-primary">
                    {{ __('Buscar') }}
                </button>
        </div>
    </form>
</div> 
<br>
<div class="container">
    @if (isset($periods))
        <table class="table table-striped">
            <thead>
                <th>Hora de inicio</th>
                <th>Hora fin</th>
                <th>reservar</th>
            </thead>
            <tbody>
                @foreach ($periods as $period)
                <tr>
                        @if (App\Models\Period::available($period,$dateUsed["date"]))
                        <td>{{$period->begin->toTimeString()}}</td>
                        <td>{{$period->end->toTimeString()}}</td>
                        @if ($dateUsed["date"]!=null)
                        <td>
                            <a href="{{route('reservation.select',['id' => $period->id ,'date'=> $dateUsed["date"]])}}"><button type="button" class="btn btn-success">Elegir</button></a>
                        </td>  
                        @endif 
                        @endif

                    {{-- @if($dateUsed["date"]->toFormattedDateString() == $dateUsed["now"]->toFormattedDateString())
                            @if($period->begin >= $dateUsed["now"])
                            <td>{{$period->begin->toTimeString()}}</td>
                            <td>{{$period->end->toTimeString()}}</td>
                            <td>
                                <a href="{{route('register_reservation',['pet' => $pet->id , 
                                'period' => $period->id, 'date'=> $dateUsed["date"]])}}"><button type="button" class="btn btn-success">Elegir</button></a>
                            </td>
                            @endif
                    @else
                    <td>{{$period->begin->toTimeString()}}</td>
                    <td>{{$period->end->toTimeString()}}</td>
                    <td>
                        <a href="{{route('register_reservation',['pet' => $pet->id , 
                        'period' => $period->id, 'date'=> $dateUsed["date"]])}}"><button type="button" class="btn btn-success">Elegir</button></a>
                    </td>
                    @endif --}}
                </tr> 
                @endforeach
            </tbody>
        </table> 
    @endif
</div>              
<br>
@endsection