@extends('adminlte::page')

@section('title', 'Laboratorio')

@section('content_header')
    <h1>Listar Prueba</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{route('proofs.create')}}" class="btn btn-primary btb-sm">Crear Análisis</a>

    </div>
</div>
<div class="card">
    <div class="card-body">
        <table class="table table-striped" id="proofs" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Detalle</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($proofs as $proof)
                     
               
                    <tr>
                        <td>{{$proof->id}}</td>
                        <td>{!!$proof->detail!!}</td> 
                        <td>{{$proof->price}}</td>                            
                        @if ($proof->image==NULL)
                            <td><img src="{{asset('images/imagen.jpg')}}" alt="" width="60" height="70" ></td>
                            @else
                            <td><img src="{{asset('images/'.$proof->image)}}" alt="" width="60" height="70" ></td>
                        @endif
                       
                        <td >
                            <form action="{{route('proofs.destroy', $proof->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <a href="{{route('proofs.edit', $proof->id)}}" class="btn btn-primary btn-sm fas fa-edit  cursor-pointer"></a>

                                <button class="btn btn-danger btn-sm fas fa-trash-alt  cursor-pointer" onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')" value="Borrar"></button>                                    

                            </form>
                        </td>
                    </tr>
               
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
         $('#proofs').DataTable();
        } );
    </script> 
    @stop