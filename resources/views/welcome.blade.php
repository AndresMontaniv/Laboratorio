@extends('layouts.app')
@section('content')
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <br><br><br>      
                <img style="background-size: cover; height: 90%;
                width: 100%; margin-right: 10%;" src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/d60dee72-6ded-4e94-afc5-e414a2d93836/d5hq2mv-9bd2e028-9e94-47cc-895f-39b7f0b303eb.jpg/v1/fill/w_762,h_1049,q_75,strp/enfermera_kawaii_by_amoelanimme-d5hq2mv.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwic3ViIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsImF1ZCI6WyJ1cm46c2VydmljZTppbWFnZS5vcGVyYXRpb25zIl0sIm9iaiI6W1t7InBhdGgiOiIvZi9kNjBkZWU3Mi02ZGVkLTRlOTQtYWZjNS1lNDE0YTJkOTM4MzYvZDVocTJtdi05YmQyZTAyOC05ZTk0LTQ3Y2MtODk1Zi0zOWI3ZjBiMzAzZWIuanBnIiwid2lkdGgiOiI8PTc2MiIsImhlaWdodCI6Ijw9MTA0OSJ9XV19.lB8Wmzf9pvt-YxxwQxNK-A93hOh-wNoMbqbU5yIyf3w" class="img-fluid">
            <br><br>   
        </div>
        <br><br>
        <div class="col-md-6">
            <br>
            <h1 style="color: #0b924a"><b>Nuestra Misión</b></h1>
            <h5>Las Clínicas JALDIN están suscritas a un decálogo de ética y compromiso con sus pacientes, cuya misión es resolver de manera global cualquier inquietud estética por medio de las diferentes unidades Médicas y Quirúrgicas de las que disponemos, aumentando la calidad de vida de las personas con las mínimas molestias y con el coste más bajo posible y contando con las técnicas más innovadoras, las mejores clínicas y los profesionales más preparados que garantizan la mayor seguridad, calidad y bienestar a nuestros pacientes.</h5>
            <h1 style="color: #0b924a"><b>Nuestra Visión</b></h1>
            <h5>Estar cada vez más cerca del paciente a través de la apertura de nuevas clínicas en Bolivia, alentando y motivando continuamente a nuestro equipo humano para que mantenga su rigor, profesionalidad y ética.</h5>
            <h1 style="color: #0b924a"><b>Nuestros Valores</b></h1>
            <h5>
                <ul>
                    <li>Realizar nuestro trabajo con la pasión, dedicación y entusiasmo necesario para llevar a cabo nuestra misión.</li>
                    <li>Honestidad, para transmitir confianza en todos los ámbitos ajustándonos siempre a la verdad.</li>
                    <li>Respeto a nuestros pacientes mejorando tu calidad de vida.</li>
                </ul>
            </h5>
            
            <div class="mt-5">
                @guest
                <a href="{{route('login')}}"><button type="button" class="btn btn-info">Login <i class="fas fa-heartbeat"></i> </button></a> 
                @endguest       
            </div>
            
        </div>
    </div>
    <br>
    <br>
</div>
@endsection