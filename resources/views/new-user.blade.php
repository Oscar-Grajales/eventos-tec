@include('header')

<div class="container">
    <h1 class="mt-5">Nuevo usuario</h1>

    <div class="col-md-7 col-lg-8 mt-4">
      <form action="{{route('users.store')}}" method="POST" class="needs-validation" novalidate>
        @csrf
        <div class="row g-3">
          <div class="col-12">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="John Doe">
            <div class="invalid-feedback">
              Please enter a valid email address for shipping updates.
            </div>
          </div>
          <div class="col-12">
            <label for="email" class="form-label">Correo</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com">
            <div class="invalid-feedback">
              Please enter a valid email address for shipping updates.
            </div>
          </div>
          <div class="col-12">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="***********">
            <div class="invalid-feedback">
              Please enter a valid email address for shipping updates.
            </div>
          </div>
          <div class="col-12">
            <label for="role" class="form-label">Rol</label>
            <select class="form-select" name="role" id="role">
              <option value="client">Cliente</option>
              <option value="employee">Empleado</option>
              <option value="manager">Gerente</option>
            </select>  
            <div class="invalid-feedback">
              Please enter a valid email address for shipping updates.
            </div>
          </div>
        </div>
        <hr class="my-4">
        <div class="d-flex justify-content-center">
          <button class="w-75 btn btn-primary btn-lg my-5" type="submit">Crear nuevo usuario</button>
        </div>
      </form>
    </div>      

  </div>

@include('footer')