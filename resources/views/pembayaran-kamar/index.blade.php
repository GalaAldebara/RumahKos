@extends('layouts.main')

@section('container')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <h3 class="fw-semibold" style="color: #5bb6e8; font-size: 26px;">Informasi Penyewa</h3>
            <ul class="list-unstyled" style="font-size: 16px;">
                <li>
                    <strong>Nama penyewa</strong>
                    <br>
                    <span> {{ $order->getuser->nama_depan }}</span>
                </li>
                <li>
                    <strong>Nomor HP</strong>
                    <br>
                    <span> {{ $order->getuser->no_telp }}</span>
                </li>
                <li>
                    <strong>KTP</strong>
                    <br>
                    <span>{{ $order->getuser->nik }}</span>
                </li>
                <li>
                    <strong>Tanggal Mulai</strong>
                    <br>
                    <span>{{ date('d F Y', strtotime($data->tanggal_pemesanan)) }}</span>
                </li>
                <li>
                    <strong>Tanggal Selesai</strong>
                    <br>
                    <span>{{ date('d F Y', strtotime($data->dibooking_sampai ?? now())) }}</span>
                </li>
                <li>
                    <strong>Status</strong>
                    <br>
                    <span>{{ $order->status}}</span>
                </li>
            </ul>
        </div>

        <div class="col-md-4">
            <div class="card mb-3">
                <img src="{{ asset('images/products/kamar1.png') }}" class="card-img-top" alt="Kost Image">
                <div class="card-body  text-start">
                    <h6 class="fw-bold" style="font-size: 24px;">Kost Putra</h6> <!-- Increased font size -->
                    <p class="mb-1" style="font-size: 18px;">{{ $order->getkamar->nama}}</p> <!-- Increased font size -->
                    <p class="text-muted small" style="font-size: 16px;">WiFi • Kasur • Air • K. Mandi Dalam</p> <!-- Optional: Adjust size if needed -->
                </div>
            </div>
            <div class="card p-3">
                <h6 class="fw-bold">Rincian Pembayaran</h6>
                <p class="text-muted small">Akan diarahkan ke halaman detail kamar setelah pembayaran</p>
                <div class="d-flex justify-content-between">
                    <p>Biaya sewa kos</p>
                    <p>Rp{{ number_format($kamar->getkamar->harga, 0, ',', '.') }}</p>
                </div>

                <div class="d-flex justify-content-between">
                    <p>Durasi Tinggal <i class="bi bi-question-circle" data-bs-toggle="tooltip" title="Info about deposit"></i></p>
                    <p>{{ $order->total_tinggal}} Bulan</p>
                </div>
                <hr>
                <div class="d-flex justify-content-between fw-bold">
                    <p>Total pembayaran</p>
                    <p>Rp{{ number_format($order->harga, 0, ',', '.') }} </p>
                    <button class="btn btn-primary" id="pay-button">Bayar Sekarang</button>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div id="snap-container"></div>

    </div>
</div>
@endsection

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
         // alert("payment success!"); console.log(result);
        window.location.href = '/histori'
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
