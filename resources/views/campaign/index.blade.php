@extends('layouts.app')
@section('content')
<br>
<br>
<div class="container">
    <div class="row">
        @foreach ($campaigns as $campaign)
        <div class="col-md-3">   
            <div class="card" style="width: 18rem; height: 30rem; margin: 8px;">
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        {{-- @if ($campaign->imagen == null)
                        <li class="list-group-item" style= "text-align: center;"><img src="{{asset('./Icons/offer.png')}}" style="text-align: center;" class="card-img-top" alt="logo" width="100" height="200"></li>
                        @else
                        <li class="list-group-item" style= "text-align: center;"><img src="{{ asset('/storage/images/'.$campaign->image )}}" class="card-img-top" alt="logo" width="150" height="200"></li>
                        @endif --}}
                        {{-- <li class="list-group-item" style= "text-align: center;"><img src="{{asset('./Icons/offer.png')}}" style="text-align: center;" class="card-img-top" alt="logo" width="90" height="150"></li> --}}
                        <li class="list-group-item" style= "text-align: center;"><h4 class="card-title">{{$campaign->title}} </h4></li>
                        <li class="list-group-item"><p class="card-text" style="width: 12rem; height: 7rem; padding: 3px; margin: 8px; text-align: center;">{{$campaign->body}}</p></li>
                        <li class="list-group-item"><p class="card-text" style= "text-align: center;"><b>{{$campaign->discount. " bs  "}}</b><i class="fas fa-first-aid"></i></p></li>
                        <li class="list-group-item">
                            <p class="card-text" style= "text-align: center;">
                                <b>{{"Desde ".$campaign->initialDate->toFormattedDateString()." al ".$campaign->expiration->toFormattedDateString()}}</b>
                            </p>
                        </li>                        
                    </ul>     
                </div>
            </div>    
        </div>
        <div class="col-md-1">
            <br>
        </div>
        @endforeach
    </div>
    <br>
    <br>
</div>
@endsection