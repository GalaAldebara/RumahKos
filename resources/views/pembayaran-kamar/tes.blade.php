@extends('layouts.main')

@section('container')
 
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card p-4">
                <h3 class="mb-4" >Toko durian</h3>
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title">Detail Pesanan</h5>
                      <table>
                        <tr>
                            <td>Nama</td>
                            <td> : {{ $order->getuser->nama_depan }}</td>
                        </tr>
                            <td>Qty</td>
                            <td> : {{ $order->total_tinggal }}</td>
                        </tr>
                        <tr>
                            <td>Total Harga</td>
                            <td> : {{ $order->harga }}</td>
                        </tr>
                      </table>
                      <button class="btn btn-primary" id="pay-button">Bayar Sekarang</button>
                     
                    </div>
                    <div id="snap-container"></div>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@push('scripts')
    
<script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
      // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token.
      // Also, use the embedId that you defined in the div above, here.
      window.snap.embed('{{$snapToken}}', {
        embedId: 'snap-container',
        onSuccess: function (result) {
          /* You may add your own implementation here */
          alert("payment success!"); console.log(result);
        //   window.location.href = '/invoice/{{ $order->id }}'
        },
        onPending: function (result) {
          /* You may add your own implementation here */
          alert("wating your payment!"); console.log(result);
        },
        onError: function (result) {
          /* You may add your own implementation here */
          alert("payment failed!"); console.log(result);
        },
        onClose: function () {
          /* You may add your own implementation here */
          alert('you closed the popup without finishing the payment');
        }
      });
    });
  </script>
@endpush


