@include('header')

<div class="container">
    <div class="row">
        <div class="col-7">
            <h1 class="mt-5">{{$event->name}}</h1>
            <h3 class="mt-4 text-success">${{number_format($event->price, 2, '.', ',')}}</h3>

            <div class="mx-4">
                <h5>Abonado: ${{number_format($payments, 2, '.', ',')}}</h5>
                <h5>Restante: ${{number_format($remaining, 2, '.', ',')}}</h5>
            </div>

            @can('create', App\Models\Payment::class)
            <div>
                <button type="button" class="btn btn-primary" id="btn-create-payment">
                    <i class="bi bi-cash-coin"></i>
                    Crear abono
                </button>
                <div class="mb-4" id="form-payment" style="display: none">
                    <hr>
                    <form action="/payments" method="post">
                        @csrf
                        <input type="hidden" name="event_id" value="{{$event->id}}">
                        <div class="col-12">
                            <label for="amount" class="form-label">Cantidad</label>
                            <input type="number" name="amount" class="form-control" id="amount-payment">
                        </div>
                        <div class="row mt-3 px-4">
                            <button type="submit" class="mx-2 col btn btn-success">Registrar abono</button>
                            <button class="mx-2 col btn btn-outline-danger" id="btn-cancel-create-payment">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
            @endcan

            <p class="fs-5 col-md-8 mt-4">Estado: {{$event->status}}</p>
            <p class="fs-5 col-md-8 mt-4">Inicio: {{$event->starts_at}}</p>
            <p class="fs-5 col-md-8 mt-4">Fin: {{$event->ends_at}}</p>
        </div>
        <div class="col-5">
            @can('create', App\Models\Expense::class)
            <h4 class="mt-5">Gastos de este evento</h4>
            <button type="button" class="btn btn-primary mb-2" id="btn-create-expense">
                <i class="bi bi-plus-square"></i>
                Crear gasto
            </button>
            <div class="mb-4" id="form-expense" style="display: none">
                <hr>
                <form action="/expenses" method="post">
                    @csrf
                    <input type="hidden" name="event_id" value="{{$event->id}}">
                    <div class="col-12">
                        <label for="amount" class="form-label">Cantidad</label>
                        <input type="number" name="amount" class="form-control" id="amount">
                    </div>
                    <div class="col-12" id="description">
                        <label for="description" class="form-label">Descripción</label>
                        <textarea class="form-control" name="description" rows="3"></textarea>
                    </div>
                    <div class="row mt-3 px-4">
                        <button type="submit" class="mx-2 col btn btn-success">Guardar gasto</button>
                        <button class="mx-2 col btn btn-outline-danger" id="btn-cancel-create-expense">Cancelar</button>
                    </div>
                </form>
            </div>
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($event->expenses as $expense)
                    <tr>
                        <th scope="row">{{$expense->id}}</th>
                        <td>${{number_format($expense->amount, 2, '.', ',')}}</td>
                        <td>{{$expense->description}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endcan
        </div>
    </div>
    <div class="mb-4">
        @can('create', [App\Models\Photo::class, $event])
        <h4 class="mt-4 mb-3">Fotos del evento</h4>
        <div class="mb-3">
            <button type="button" class="btn btn-primary" id="btn-add-photo">
                <i class="bi bi-card-image"></i>    
                Agregar foto
            </button>
            <div id="upload-photo" style="display: none">
                <hr>
                <form action="/photos" method="post" enctype="multipart/form-data" class="row my-4">
                    @csrf
                    <input type="hidden" name="event_id" value="{{$event->id}}">
                    <div class="col-6">                    
                        <input class="form-control" type="file" id="formFile" name="photo">                    
                    </div>
                    <button type="submit" class="col-2 mx-2 btn btn-success">Subir foto</button>
                    <button class="col-2 mx-2 btn btn-outline-danger" id="btn-cancel-upload">Cancelar</button>
                </form>
            </div>
        </div>
        @endcan      

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach($event->photos as $photo)
            <div class="col">
                <div class="card shadow-sm">
                    <img src="{{asset($photo->path)}}" class="rounded-top" alt="" width="100%" height="225">
                    <div class="card-body">
                        <div class="d-flex justify-content-center align-items-center">
                            @can('delete', $photo)
                            <form action="/photos/{{$photo->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-trash3-fill"></i>
                                    Eliminar
                                </button>
                            </form>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>        
    </div>
</div>

<script>
    // Sección de abono
    let btnCreatePayment = document.getElementById('btn-create-payment');
    let formPayment = document.getElementById('form-payment');
    let btnCancelCreatePayment = document.getElementById('btn-cancel-create-payment');

    btnCreatePayment?.addEventListener('click', (e) => {
        e.preventDefault();
        formPayment.style.display = 'block';
        btnCreatePayment.disabled = true;        
    });

    btnCancelCreatePayment?.addEventListener('click', (e) => {
        e.preventDefault();
        btnCreatePayment.disabled = false;
        formPayment.style.display = 'none';
    });

    // Sección de gastos
    let btnCreateExpense = document.getElementById('btn-create-expense');
    let formExpense = document.getElementById('form-expense');
    let btnCancelCreateExpense = document.getElementById('btn-cancel-create-expense');

    btnCreateExpense?.addEventListener('click', (e) => {
        e.preventDefault();
        formExpense.style.display = 'block';
        btnCreateExpense.disabled = true;        
    });

    btnCancelCreateExpense?.addEventListener('click', (e) => {
        e.preventDefault();
        btnCreateExpense.disabled = false;
        formExpense.style.display = 'none';
    });

    // Sección de fotos
    let btnAddPhoto = document.getElementById('btn-add-photo');
    let uploadPhoto = document.getElementById('upload-photo');
    let btnCancelUpload = document.getElementById('btn-cancel-upload');

    btnAddPhoto.addEventListener('click', (e) => {
        e.preventDefault();
        uploadPhoto.style.display = 'block';
        btnAddPhoto.disabled = true;        
    });

    btnCancelUpload.addEventListener('click', (e) => {
        e.preventDefault();
        btnAddPhoto.disabled = false;
        uploadPhoto.style.display = 'none';
    });
</script>

@include('footer')