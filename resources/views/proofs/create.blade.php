@extends('adminlte::page')

@section('title', 'Laboratorio')

@section('content_header')
    <h1>Registrar Prueba</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">

            <form action="{{route('proofs.store')}}" method="post" novalidate  enctype="multipart/form-data">
                @csrf
                   <div class="form-row">
                       <div class="form-group col-md-6">
                        <label for="price">Precio</label>
                        <input type="text" name="price" class="form-control" value="{{old('price')}}">
                        @error('price')
                            <small>*{{$message}}</small>
                            <br><br>
                        @enderror
                        
                       </div>
                       <div class="form-group col-md-6">
                        <label for="name">Nombre:</label>
                        <input type="text" name="name" class="form-control" value="{{old('name')}}">
                        @error('name')
                            <small>*{{$message}}</small>
                        @enderror
                       
                    
                    </div>
                   </div>

             

               
                        <label for="image">Image</label>
                        <input type="file" accept="image/*" class="form-control @error('image') is-invalid @enderror" name="image" value="{{old('image')}}">
                   
                        @error('image')
                        <small>*{{$message}}</small>
                        <br><br>
                    @enderror
     
                   <br>
                 
               
                  <div class="form-group">
                      <label for="detail">Detalle</label>
                      <textarea id="detail" class="form-control" name="detail" rows="3"></textarea>
                  </div>
                  
    

            

                <button  class="btn btn-danger btn-sm" type="submit">Registrar</button>
              </form>

    </div>
</div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#detail' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@stop