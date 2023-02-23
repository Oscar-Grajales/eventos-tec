@include('header')

<div class="container">
    <h1 class="mt-5">Nueva contraseña</h1>

    <div class="col-md-7 col-lg-8 mt-4">
      <form action="/users/{{$id}}" method="POST" class="needs-validation" novalidate>
          @csrf
          @method('PUT')
        <div class="row g-3">
          <div class="col-12">
            <label for="password" class="form-label">Nueva contraseña</label>
            <input type="text" name="password" class="form-control" id="password">
          </div>
          <div class="col-12">
            <label for="password-again" class="form-label">Nueva contraseña (otra vez)</label>
            <input type="text" name="password-again" class="form-control" id="password-again">
          </div>
        </div>
        <hr class="my-4">
        <div class="d-flex justify-content-center">
          <button class="w-75 btn btn-primary btn-lg my-5" type="submit" id="btn-enviar" disabled>
            <i class="bi bi-key"></i>
            Restablecer contraseña
          </button>
        </div>
      </form>
    </div>
  </div>

  <script>
      let btnEnviar = document.getElementById('btn-enviar');
      let password = document.getElementById('password');
      let passwordAgain = document.getElementById('password-again');
      passwordAgain.addEventListener('input', (e) => {
        if(password.value === passwordAgain.value) {
            btnEnviar.disabled = false;
        } else {
            btnEnviar.disabled = true;
        }
      });
  </script>

@include('footer')