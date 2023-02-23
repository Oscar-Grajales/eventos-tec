@include('header')

<div class="container">
    <h1 class="mt-5">Editar evento</h1>

    <h4 class="mt-4 text-primary">{{$event->name}}</h4>

    <div class="col-md-7 col-lg-8 mt-4">
      <form action="/events/{{$event->id}}" method="POST" class="needs-validation" novalidate>
          @csrf
          @method('PUT')
        <div class="row g-3">
          @can('updateAsManager', App\Models\Event::class)
          <div class="col-12">
            <label for="price" class="form-label">Precio</label>
            <input type="number" name="price" class="form-control" id="price" value="{{$event->price}}">
          </div>
          <div class="col-12">
            <label for="status" class="form-label">Confirmar</label>
            <select class="form-select" name="status" id="status">
              <option value="unconfirmed">No confirmado</option>
              <option value="confirmed">Confirmado</option>
            </select>
          </div>
          <div class="col-12" id="reason">
            <label for="reason" class="form-label">¿Por qué no quieres confirmar?</label>
            <textarea class="form-control" name="reason" rows="3"></textarea>
          </div>
          @endcan
          @can('updateAsClient', App\Models\Event::class)
          <div class="col-12">
            <label for="starts_at" class="form-label">Fecha de inicio</label>
            <input type="datetime-local" class="form-control" id="starts_at" name="starts_at" value="{{date('Y-m-d\TH:i:s', strtotime($event->starts_at))}}">
          </div>
          <div class="col-12">
            <label for="ends_at" class="form-label">Fecha de finalización</label>
            <input type="datetime-local" class="form-control" id="ends_at" name="ends_at" value="{{date('Y-m-d\TH:i:s', strtotime($event->ends_at))}}">
          </div>
          @endcan
        </div>
        <hr class="my-4">
        <div class="d-flex justify-content-center">
          <button class="w-75 btn btn-primary btn-lg my-5" type="submit">Actualizar evento</button>
        </div>
      </form>
    </div>
  </div>

<script>
  let status = document.getElementById('status');
  let reason = document.getElementById('reason');

  status.addEventListener('change', (e) => {
    if(status.value === "confirmed") {
      reason.style.display = 'none';
      reason.lastElementChild.value = null;
    } else {
      reason.style.display = 'block';
    }
  });
</script>

@include('footer')