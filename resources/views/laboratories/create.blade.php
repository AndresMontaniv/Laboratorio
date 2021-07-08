@extends('layouts.app')
@section('content')
    @if ($errors->count() > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <br>
    <div class="container"> 
        <br>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><h2>Registro de nuevo laboratorio</h1></li>
        </ul>
        <div class="card-body">
            <form method="POST" action="{{ route('laboratory.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="nameL" class="col-md-4 col-form-label text-md-right">{{ __('Nombre del laboratorio') }}</label>

                    <div class="col-md-6">
                        <input id="nameL" type="text" class="form-control @error('nameL') is-invalid @enderror" name="nameL" value="{{ old('nameL') }}"  autofocus>

                        @error('nameL')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input id="image" type="file" accept="image/*" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" >
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user {{ config('adminlte.classes_auth_icon', '') }}"></span>
                        </div>
                    </div>
                    @if($errors->has('image'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('image') }}</strong>
                        </div>
                    @endif
                </div>
                
                <input type="hidden" name="plan_id" value="{{$plan->id}}">       
                 {{-- form's part destinate to create new Admin User  --}}
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre del Administrador') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> 

                <div class="form-group row">
                    <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Telefono del Administrador') }}</label>

                    <div class="col-md-6">
                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}"  autofocus>

                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="ci" class="col-md-4 col-form-label text-md-right">{{ __('Carnet de identidad del Administrador') }}</label>

                    <div class="col-md-6">
                        <input id="ci" type="text" class="form-control @error('ci') is-invalid @enderror" name="ci" value="{{ old('ci') }}"  autofocus>

                        @error('ci')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="birthday" class="col-md-4 col-form-label text-md-right">{{ __('Cumpleaños') }}</label>
                    <div class="col-md-6">
                        <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{ old('birthday') }}">

                        @error('birthday')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('contraseña') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar contraseña') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  required autocomplete="new-password">
                    </div>
                </div>

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