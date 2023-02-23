@include('header')

<div class="container">
    <h1 class="mt-5">Paquetes</h1>
    
    <div class="my-4">
    @can('create', App\Models\Pack::class)
      <a href="{{route('packs.create')}}" class="btn btn-success"><i class="bi bi-plus-circle"></i> Crear paquete</a>
    @endcan
    </div>    

    <table class="table">
        <thead class="table-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Paquete</th>
            <th scope="col">Estado</th>
            <th scope="col">Ver</th>
            <th scope="col">Habilitar</th>
          </tr>
        </thead>
        <tbody>
            @foreach($packs as $pack)
          <tr>
            <th scope="row">{{$pack->id}}</th>
            <td>{{$pack->name}}</td>
            <td>{{$pack->status}}</td>
            <td>
              <a href="#" onclick="viewPack({{$pack->id}})" class="btn btn-primary px-4">Ver</a>
            </td>
            @can('update', $pack)
            <td>
              <a href="/packs/{{$pack->id}}/enable" class="btn btn-success px-4">Habilitar</a>
            </td>
            @endcan
          </tr>
          @endforeach
        </tbody>
      </table>

  </div>

  <script>
    document.getElementById('nav-packs').classList.add('active');
  </script>

@include('footer')