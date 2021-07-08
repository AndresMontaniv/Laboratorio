<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuarios</title>
 <style>
  #pac{
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100;
  }
  #pac td, #pac th {
      border:1px solid #ddd;
      padding: 8px;
  }
  #pac th{
   padding-top:12px;
   padding-bottom:12px;
   text-align: left;
   background-color:#4CAF50;
   color: #fff;
  }

 </style>
   
</head>
<body>
    <div class="container">
        
        <table  class="table table-striped table-bordered shadow-lg mt-4"  id="pac">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Estado</th>
                <th scope="col">Nombre Usuario</th>
                <th scope="col">Ci</th>
                <th scope="col">Nombre</th>
                <th scope="col">Telefono</th>
                <th scope="col">Fecha Nacimiento</th>
                <th scope="col">Correo</th>
               
            </tr>
    
            </thead>
            <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->status}}</td>
                <td>{{$user->username}}</td>
                <td>{{$user->ci}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->birthday}}</td>
                <td>{{$user->email}}</td>
                
              
            </tr>
            @endforeach
           </tbody>
      </table>
    </div>
</body>
</html>






