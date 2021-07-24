@extends('adminlte::page')

@section('title', 'Laboratorio')


@section('content_header')
    <h1>Listar Analisis</h1>
@stop




@section('content')

    <div class="card">
        <div class="card-header">
            <a href="{{route('analysis.create')}}"class="btn btn-primary btb-sm">Registrar Analisis</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="analyses" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Laboratorio</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Paciente</th>
                        <th scope="col">Monto Total</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($analyses as $anlysis)
                        <tr>
                            <td>{{$anlysis->id}}</td>
                            <td>{{$anlysis->lab_id}}</td>
                            <td>{{$analysis->updated_at}}</td> 
                            <td>{{DB::table('users')->where('id',$anlysis->patient_id)->value('name')}}</td> 
                            <td>{{$anlysis->total}}</td>
                            
                            <td>
                                <form action="" method="post">
                                    @csrf
                                    @method('delete')

                                    <a href="{{route('bills.edit',$anlysis->id)}}" class="btn btn-primary btn-sm fas fa-edit  cursor-pointer"></a>
                                    <a class="btn btn-success btn-sm fas fa-eye  cursor-pointer" href="{{route('bills.show',$facturas->id)}}"></a>

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
         $('#analyses').DataTable();
        } );
    </script>
@stop


