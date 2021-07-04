@extends('layouts.app')
@section('content')
<br>
<br>
<div class="container">
    <div class="row">
        
        @foreach ($plans as $plan)
        <div class="col-md-3">   
            <div class="card" style="width: 18rem;">
                <img src="https://clipground.com/images/bargain-clipart-9.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h4 class="card-title">{{$plan->name}}</h4>
                  <p class="card-text">{{$plan->description}}</p>
                  <br>
                  <p class="card-text"><b>{{$plan->price}}</b></p>
                  <a href="{{route('laboratory.create', $plan->id)}}" class="btn btn-success">Comprar</a>
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