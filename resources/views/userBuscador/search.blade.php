@extends('adminlte::page')

@section('title', 'Busqueda')

@section('content_header')
    <h1 class="text-capitalize">Query Builder User</h1>
@stop

@section('content')
<div class="card container">
    <div class="card-body">
        <form method="post" action="{{url('/userbuscador')}}" novalidate  enctype="multipart/form-data">

            @csrf
            <div class="row my-2">
                <div class="col">
                    <h5 class="text-capitalize">ID:</h5>
                    <input type="text"  name="id" placeholder="Escribe un ID de user"  class="focus border-primary  form-control" >
                </div>
                <div class="col">
                    <h5 class="text-capitalize">CI:</h5>
                    <input type="text"  name="ci" placeholder="Escribe un CI de user"  class="focus border-primary  form-control" >
                </div>
            </div>
            <div class="row my-2">
                <div class="col">
                    <h5 class="text-capitalize">username:</h5>
                    <input type="text"  name="username" placeholder="Escribe un username de user"  class="focus border-primary  form-control" >
                </div>
                <div class="col">
                    <h5 class="text-capitalize">Email:</h5>
                    <input type="text"  name="email" placeholder="Escribe un email de user"  class="focus border-primary  form-control" >
                </div>
            </div>
            <div class="row my-2">
                <div class="col">
                    <h5 class="text-capitalize">Nombre:</h5>
                    <input type="text"  name="name" placeholder="Escribe un nombre de user"  class="focus border-primary  form-control" >
                </div>
                <div class="col">
                    <h5 class="text-capitalize">Apellidos:</h5>
                    <input type="text"  name="lastname" placeholder="Escribe unos apellidos de user"  class="focus border-primary  form-control" >
                </div>
            </div>
            <div class="row my-2">
                <div class="col-6">
                    <h5 class="text-capitalize">Telefono:</h5>
                    <input type="text"  name="phone" placeholder="Escribe un telefono de user"  class="focus border-primary  form-control" >
                </div>
                <div class="col">
                    
                </div>
            </div>
            <div class="row my-2">
                
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <h5 class="text-capitalize">Fecha de Nacimiento (Rango de Busqueda):</h5>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="date"  name="from"   class="focus border-primary  form-control" >
                        </div>
                        <div class="col">
                            <input type="date"  name="to"   class="focus border-primary  form-control" >
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="row my-2">
                <div class="col">
                    <h5 class="text-capitalize">Laboratorios:</h5>
                    <div class="form-check mx-2">
                        @foreach ($labs as $lab)
                            <input type="checkbox"  value="{{$lab->id}}" name="labs[]" class="form-check-input">
                            <p class="text-capitalize">{{$lab->name}}</p>
                            
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="row my-2">
                <div class="col">
                    <button  class="btn btn-success btn-lg btn-block" type="submit">BUSCAR</button>
                </div>
                <div class="col">
                    <a href="{{url('/user/')}}"class="btn btn-warning text-white btn-lg btn-block">VOLVER A USERS</a>
                </div>
            </div>
            
            
            
            <br>
            <br>

            
            
        </form>

    </div>
</div>
@stop




@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    
@stop