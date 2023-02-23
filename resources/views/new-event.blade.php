@include('header')

<div class="container">
    <h1 class="mt-5">Nuevo evento</h1>

    <div class="col-md-7 col-lg-8 mt-4">
      <form action="{{route('events.store')}}" method="POST" class="needs-validation" novalidate>
          @csrf
        <div class="row g-3">
          <div class="col-12">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Evento">
          </div>
          <div class="col-12">
            <label for="starts_at" class="form-label">Fecha de inicio</label>
            <input type="datetime-local" class="form-control" id="starts_at" name="starts_at">
          </div>
          <div class="col-12">
            <label for="ends_at" class="form-label">Fecha de finalización</label>
            <input type="datetime-local" class="form-control" id="ends_at" name="ends_at">
          </div>
        </div>
        <hr class="my-4">
        <div class="d-flex justify-content-center">
          <button class="w-75 btn btn-primary btn-lg my-5" name='pack' value="{{$packId}}" type="submit">Crear nuevo evento</button>
        </div>
      </form>
    </div>      

  </div>

@include('footer')