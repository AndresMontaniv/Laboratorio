@extends('adminlte::page')

@section('title', 'Analisis')

@section('content_header')
@stop

@section('content')
<div class="container " style="background-color: white">
    <div class="row justify-content-center border rounded-top">
        <div class="col">
            <div class="row border"> 
                <div class="col">
                    <div class="row justify-content-center my-2">
                        <h3 class="font-weight-bold px-2 text-uppercase">Analisis {{$analysis->id}}</h3>
                    </div>
                    <div class="row my-2">
                        <div class="col">
                            <h4>Ultima Modificacion: {{$analysis->updated_at}}</h4>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col">
                            <div class="row">
                                <h5 class="font-weight-bold px-2">Paciente: </h5>
                            </div>
                            <div class="row px-2">
                                <div class="col-1">
                                    <i class="fas fa-user" style="color: rgb(69, 160, 206); font-size:25px"></i>
                                </div>
                                <div class="col-5">
                                    <h5 class="px-2">{{$patient->name}}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <h5 class="font-weight-bold px-2">Enfermero: </h5>
                            </div>
                            <div class="row px-2">
                                <div class="col-1">
                                    <i class="fas fa-user-nurse" style="color: rgb(69, 160, 206); font-size:25px"></i>
                                </div>
                                <div class="col-5">
                                    <h5 class="px-2">{{$nurse->name}}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <h5 class="font-weight-bold px-2">Prueba: </h5>
                            </div>
                            <div class="row px-2">
                                <div class="col-1">
                                    <i class="fas fa-vials" style="color: rgb(69, 160, 206); font-size:25px"></i>
                                </div>
                                <div class="col-5">
                                    <h5 class="px-2">{{$proof->name}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col">
                            <div class="row">
                                <h5 class="font-weight-bold px-2">Descuento: </h5>
                            </div>
                            <div class="row px-2">
                                <div class="col-1">
                                    <i class="fas fa-tag" style="color: rgb(69, 160, 206); font-size:25px"></i>
                                </div>
                                <div class="col-5">
                                    <h5 class="px-2">{{$analysis->discount}}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <h5 class="font-weight-bold px-2">Precio: </h5>
                            </div>
                            <div class="row px-2">
                                <div class="col-1">
                                    <i class="fas fa-money-check-alt" style="color: rgb(69, 160, 206); font-size:25px"></i>
                                </div>
                                <div class="col-5">
                                    <h5 class="px-2">{{$analysis->price}}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <h5 class="font-weight-bold px-2">Total: </h5>
                            </div>
                            <div class="row px-2">
                                <div class="col-1">
                                    <i class="fas fa-money-check-alt" style="color: rgb(69, 160, 206); font-size:25px"></i>
                                </div>
                                <div class="col-5">
                                    <h5 class="px-2">{{$analysis->total}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col">
                            <div class="row">
                                <h5 class="font-weight-bold px-2">Documento: </h5>
                            </div>
                            <div class="row px-2">
                                <div class="col-1">
                                    <i class="fas fa-file-alt" style="color: rgb(69, 160, 206); font-size:25px"></i>
                                </div>
                                <div class="col-5">
                                    <h5 class="px-2">{{$analysis->doc}}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <h5 class="font-weight-bold px-2">Detalle: </h5>
                            </div>
                            <div class="row px-2">
                                <div class="col-1">
                                    <i class="fas fa-notes-medical" style="color: rgb(69, 160, 206); font-size:25px"></i>
                                </div>
                                <div class="col-5">
                                    <h5 class="px-2">{{$analysis->detail}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <a href="{{url('/analysis/')}}"class="btn btn-primary text-white btn-lg btn-block">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>    
       
</div>
@stop




@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop