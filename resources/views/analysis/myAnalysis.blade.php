@extends('layouts.app')
@section('content')
<br>
<br>
<div class="container">
    @if ($errors->count() > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>

<div class="container">
    @if (isset($analyses))
        <table class="table table-striped">
            <thead>
                <th>enfermero: </th>
                <th>Descuento: </th>
                <th>Total: </th>
                <th>Creacion: </th>
            </thead>
            <tbody>
                @foreach ($analyses as $analysis)
                <tr>
                    <td>{{$analysis->nurse->name}}</td>
                    <td>{{$analysis->discount}}</td>
                    <td>{{$analysis->total}}</td>
                    <td>{{$analysis->created_at->toDateString()}}</td>
                </tr> 
                @endforeach
            </tbody>
        </table> 
    @endif
</div>              
<br>
@endsection