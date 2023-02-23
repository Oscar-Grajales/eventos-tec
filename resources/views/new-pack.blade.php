@include('header')

<div class="container">
    <h1 class="mt-5">Nuevo paquete</h1>

    <div class="col-md-7 col-lg-8 mt-4">
      <form action="{{route('packs.store')}}" method="POST" class="needs-validation" novalidate>
          @csrf
        <div class="row g-3">
          <div class="col-12">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Paquete">
          </div>
          <div class="col-12">
            <label for="description" class="form-label">Descripción</label>
            <input type="text" name="description" class="form-control" id="description" placeholder="">
          </div>
          <div class="col-12">
            <label for="price" class="form-label">Precio</label>
            <input type="number" name="price" class="form-control" id="price" placeholder="$">
          </div>
          <div class="col-12">
            <label for="status" class="form-label">Estado</label>
            <select class="form-select" id="status" name="status">
              <option value="unavailable">No disponible</option>
              <option value="available">Disponible</option>
            </select>
          </div>
        </div>
        <hr class="my-4">
        <div class="d-flex justify-content-center">
          <button class="w-75 btn btn-primary btn-lg my-5" type="submit">Crear nuevo paquete</button>
        </div>
      </form>
    </div>      

  </div>

  @include('footer')