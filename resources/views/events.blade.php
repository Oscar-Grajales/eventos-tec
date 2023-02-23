@include('header')

<div class="container">
    <h1 class="mt-5">Eventos</h1>

    <table class="table mt-4">
        <thead class="table-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Evento</th>
            <th scope="col">Estado</th>
            <th scope="col">Ver</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
          </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
          <tr>
            <th scope="row">{{$event->id}}</th>
            <td>{{$event->name}}</td>
            <td>{{$event->status}}</td>
            <td>
              <a href="/events/{{$event->id}}" class="btn btn-primary px-4">Ver</a>
            </td>
            <td>
              @can('update', $event)
              <a href="/events/{{$event->id}}/edit" class="btn btn-warning px-4">Editar</a>
              @endcan
            </td>
            <td>
              @can('delete', $event)
              <form action="/events/{{$event->id}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger px-4">Eliminar</button>
              </form>
              @endcan
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

  </div>

<script>
  document.getElementById('nav-events').classList.add('active');
</script>

@include('footer')