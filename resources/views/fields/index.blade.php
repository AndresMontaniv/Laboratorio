@extends('adminlte::page')

@section('title', 'Laboratorio')


@section('content_header')
    <h1>Listar Atributos de Prueba</h1>
@stop




@section('content')

    <div class="card">
        <div class="card-header">
            <a href="{{route('field.create')}}"class="btn btn-primary btb-sm">Registrar Atributo de Prueba</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="atributos" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Laboratorio</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Min Femenino</th>
                        <th scope="col">Max Femenino</th>
                        <th scope="col">Min Masculino</th>
                        <th scope="col">Max Masculino</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($fields as $field)
                        <tr>
                            <td>{{$field->id}}</td>
                            <td>{{DB::table('laboratories')->where('id',$field->laboratory_id)->value('name')}}</td> 
                            <td>{{$field->name}}</td> 
                            <td>{{$field->femaleMinParam}}</td>
                            <td>{{$field->femaleMaxParam}}</td>
                            <td>{{$field->maleMinParam}}</td>
                            <td>{{$field->maleMaxParam}}</td>
                            
                            <td>
                                <form action="{{url('/field/'.$field->id)}}" method="post">
                                    @csrf
                                    @method('delete')

                                    <a href="{{route('field.edit',$field->id)}}" class="btn btn-primary btn-sm fas fa-edit  cursor-pointer"></a>

                                    <button class="btn btn-danger btn-sm fas fa-trash-alt" onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')" value="Borrar"></button>


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
         $('#atributos').DataTable();
        } );
    </script>
@stop


