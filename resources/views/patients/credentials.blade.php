<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laboratorio</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <script src={{asset("https://use.fontawesome.com/releases/v5.15.3/js/all.js")}} crossorigin="anonymous"></script>
    <link rel="shortcut icon" type="image/png" href=" {{asset('./Icons/hospital.png')}}">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<br>
<div class="container">
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">{{{"Bien hecho!! | laboratorios ".$user->laboratory->name }}}</h4>
        <p>Su registro ha sido almacenado exitosamente, favor de recordar su usuario porque sera su perfil en este laboratorio </p>
        <hr>
        <p class="mb-0">Para nuestros laboratorios es un HONOR tenerlo afiliado, muchas gracias por la confianza.</p>
    </div>
</div>

<br>
<br>
<div class="container">
    <div class="card-body">     
            <ul class="list-group list-group-flush "> 
                @if ($user->photo != null)
                <li class="list-group-item" style="text-align: center">
                    <img src="{{asset('images/'.$user->photo)}}" alt="avatar" width="150" height="150">
                </li>
                @endif
                <li class="list-group-item" style="text-align: center">{{"Nombre: ".$user->name}}</li>
                <li class="list-group-item" style="text-align: center"><b>{{"Usuario: ".$user->username}}</b></li>
                <li class="list-group-item" style="text-align: center">{{"Telefono: ".$user->phone}}</li>
                <li class="list-group-item" style="text-align: center">{{"Email: ".$user->email}}</li>
                <li class="list-group-item" style="text-align: center">
                    <a href="{{route('patient.login')}}"><button type="button" class="btn btn-success">Login</button></a>
                </li>
            </ul>
    </div>
</div>  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>