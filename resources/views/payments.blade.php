@include('header')

<div class="container">
    <h1 class="mt-5">Abonos</h1>

    <table class="table">
        <thead class="table-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Cantidad</th>
            <th scope="col">ID del evento</th>
            <th scope="col">Estado</th>
            <th scope="col">Confirmar abono</th>
          </tr>
        </thead>
        <tbody>
          @foreach($payments as $payment)
          <tr>
            <th scope="row">{{$payment->id}}</th>
            <td>${{number_format($payment->amount, 2, '.', ',')}}</td>
            <td>{{$payment->event_id}}</td>
            <td>{{$payment->status}}</td>
            <td>
              @can('update', $payment)
              <a href="payments/{{$payment->id}}/confirm" class="btn btn-primary px-4">Confirmar</a>
              @endcan
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

  </div>

  <script>
    document.getElementById('nav-payments').classList.add('active');
  </script>

@include('footer')