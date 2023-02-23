<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>EventosTec</title>

        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">

        <link rel="stylesheet" href="{{asset('css/style-login.css')}}">

    </head>
    <body class="text-center">
        
        <main class="form-signin">
            <form action="{{route('login.register')}}" method="POST" id="register-form">
                @csrf
                <h1 class="h3 mb-5 fw-bold">
                    <i class="bi bi-gem text-info"></i>
                    EventosTec
                </h1>
                
                <div class="form-floating">
                    <input type="text" name="name" class="form-control" id="name" placeholder="John Doe" required>
                    <label for="name">Nombre</label>
                </div>
                <div class="form-floating">                    
                    <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" oninput="verifyEmail()" required>
                    <label for="email">Correo</label>                    
                </div>  
                <div class="alert alert-danger" role="alert" id="error-msg" style="display: none">
                    Email no disponible
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                    <label for="password">Contraseña</label>
                </div>

                <button class="w-100 btn btn-lg btn-primary mt-4" type="submit" id="btn-register" disabled>
                    <i class="bi bi-patch-check"></i>
                    Registrarme
                </button>
                
            </form>
            <p class="mt-5 mb-3 text-muted">&copy; EventosTec</p>
        </main>

        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

        <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>
