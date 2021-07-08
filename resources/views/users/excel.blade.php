<table class="table table-striped" id="usuarios" style="width:100%">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Estado</th>
            <th scope="col">Nombre de usuario</th>
            <th scope="col">Nombre </th>
            <th scope="col">Ci </th>
            <th scope="col">FechaNacimiento </th>
            <th scope="col">Telefono </th>
            <th scope="col">Email</th>

        </tr>
    </thead>

    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->status}}</td>
                <td>{{$user->username}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->ci}}</td>
                <td>{{$user->birthday}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->email}}</td>
               
               
            </tr>
        @endforeach
    </tbody>
</table>