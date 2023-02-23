@include('header')

<div class="container">
    <h1 class="mt-5">Usuarios</h1>
    
    <a href="{{route('users.create')}}" class="btn btn-success my-4"><i class="bi bi-plus-circle"></i> Crear usuario</a>

    <table class="table">
        <thead class="table-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Rol</th>
            <th scope="col">Restablecer contraseña</th>
          </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
          <tr>
            <th scope="row">{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->role}}</td>
            <td>
              <a href="users/{{$user->id}}/edit" class="btn btn-primary px-4">Restablecer</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

  </div>

  <script>
    document.getElementById('nav-users').classList.add('active');
  </script>

@include('footer')