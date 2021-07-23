

@extends('layouts.app')
@section('title','Listado de Prueba')

@section('content')
<br>
<br>
<div class="container">
<div class="row">
    @foreach ($proofs as $proof)
        <div class="row">
            <div class="panel panel-default  bg-white rounded-lg shadow p-3">
                <div class="panel-body">
                    <div  class="row justify-content-between  rounded-lg shadow">
                      <div class="row align-items-center justify-content-between">
                          <div class="col-4">
                                @if ($proof->image==NULL)
                                <img src="{{asset('images/imagen.jpg')}}" alt="" class="img-bordered-sm"  width="400" height="200" >
                                @else
                               <img src="{{asset('images/'.$proof->image)}}" alt="" class="img-bordered-sm"  width="300" height="200">
                                @endif
                          </div>
                          <div class="col-4 mr-3" style="float:right">
                            <p> {!!$proof->detail!!} </p>

                          </div>
                      </div>
                       
                    </div>                                        
                </div>
                <div class="panel-footer">        
                    <hr>
                    <h7 class="text-black-300 mx-2">Bs {{$proof->price}}</h7>
                
                </div>
            </div>
        </div>
        <br>
        <br>
                
    @endforeach
</div>              
@endsection