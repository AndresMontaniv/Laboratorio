@extends('layouts.app')
@section('content')
    
    <div class="container"> 
        <h1>Registro de nuevo laboratorio</h1> 
        <div class="card-body">
            <form method="POST" action="{{ route('laboratory.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre del laboratorio') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <input type="hidden" name="laboratory_id" value="{{$plan->id}}">        
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-info ">
                            {{ __('Registrar') }}
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
                
            </form>
        </div>
        <div class="container">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><h4>{{$plan->name}}</h4></li>
                    <li class="list-group-item"><p>{{$plan->description}}</p></li>
                    <li class="list-group-item"><h5>{{$plan->price}}</h5></li>
                </ul>
        </div>
    </div>  
@endsection