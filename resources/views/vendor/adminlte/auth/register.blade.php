@extends('adminlte::auth.auth-page', ['auth_type' => 'register'])

@php( $login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login') )
@php( $register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register') )

@if (config('adminlte.use_route_url', false))
    @php( $login_url = $login_url ? route($login_url) : '' )
    @php( $register_url = $register_url ? route($register_url) : '' )
@else
    @php( $login_url = $login_url ? url($login_url) : '' )
    @php( $register_url = $register_url ? url($register_url) : '' )
@endif

@section('auth_header', "Registrar nuevo Usuario")

@section('auth_body')
    @if ($errors->count() > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('patients.create') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{-- Choose Lab --}}
        <?php
        $labs=DB::table('laboratories')->where('status',true)->get();
        ?>
        <div class="input-group mb-3">
            <select name="labId" id="select-lab" class="form-control" onchange="habilitar()" >
                <option value="">--seleccione su laboratorio--</option>
                    @foreach ($labs as $lab)
                        <option value="{{$lab->id}}">
                            {{$lab->name}}
                        </option>
                    @endforeach
            </select>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-flask"></span>
                </div>
            </div>
        </div>

        {{-- image field --}}
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

        {{-- Name field --}}
        <div class="input-group mb-3">
            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                   value="{{ old('name') }}" placeholder="Nombre" autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('name'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                </div>
            @endif
        </div>


        <div class="input-group mb-3">
            <input type="text" name="apellidos" class="form-control {{ $errors->has('apellidos') ? 'is-invalid' : '' }}"
                   value="{{ old('apellidos') }}" placeholder="Apellidos" autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
        </div>

        {{-- Email field --}}
        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                   value="{{ old('email') }}" placeholder="{{ __('adminlte::adminlte.email') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('email'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </div>
            @endif
        </div>

        {{-- Password field --}}
        <div class="input-group mb-3">
            <input type="password" name="password"
                   class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                   placeholder="Contraseña">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('password'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                </div>
            @endif
        </div>

        {{-- Confirm password field --}}
        <div class="input-group mb-3">
            <input type="password" name="password_confirmation"
                   class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                   placeholder="Confirmar Contraseña">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('password_confirmation'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </div>
            @endif
        </div>


        <div class="input-group mb-3">
            <input type="text" name="ci"
                   class="form-control"
                   placeholder="{{ __('CI: ej. 85412339') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="far fa-id-card"></span>
                </div>
            </div>
        </div>

        <div class="input-group mb-3">
            <input type="date" name="fechaNac"
                   class="form-control"
                   placeholder="{{ __('CI: ej. 85412339') }}">
            
        </div>
        
        <div class="input-group mb-3">
            <input type="text" name="telefono"
                   class="form-control"
                   placeholder="{{ __('#: ej. 75423156') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-phone-volume"></span>
                </div>
            </div>
        </div>

        {{-- Register button --}}
        <button type="submit" class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
            <span class="fas fa-user-plus"></span>
            Registrarse
        </button>

        

    </form>
@stop

@section('auth_footer')
    <p class="my-0">
        <a href="{{ $login_url }}">
            Ya tengo una cuenta
        </a>
    </p>
@stop
