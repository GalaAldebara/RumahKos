@extends('layouts.main')

@section('container')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card p-4">
                <h3 class="mb-4" >Rincian Pembayaran</h3>
                <div class="row">
                    <div class="col-md-4 text-center">
                        <img src="{{ asset('images/products/qrcode.png') }}" class="img-fluid" alt="QR Code" style="max-width: 200px;">
                        <p class="mt-4 text-muted">Screenshot manual jika QR Code tidak bisa di-download.</p>
                        <button class="btn btn-warning mt-2">Unduh Kode QR</button>
                        <h2 class="text-success mt-3">Rp 27.294</h2>
                    </div>
                    <div class="col-md-8">
                        <h5 class="fw-bold">Tata Cara Pembayaran</h5>
                        <ol style="color: #6484fc;">
                            <li>Unduh Kode QR atau screenshot kode QR pada invoice.</li>
                            <li>Masuk ke aplikasi E-Wallet atau E-Banking yang Anda gunakan, kemudian klik tombol Scanner atau Bayar.</li>
                            <li>Setelah itu, klik ikon Upload QR dari galeri atau yang ada logo gambar.</li>
                            <li>Pilih gambar QRIS yang kamu download atau screenshot di galeri.</li>
                            <li>Klik OK untuk melanjutkan ke proses berikutnya.</li>
                            <li>Klik Bayar Sekarang untuk menyelesaikan proses transaksi.</li>
                        </ol>
                    </div>
                </div>

                <div class="mt-4">
                    <h5>Progress Transaksi</h5>
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 33%;" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100">
                            Transaksi Dibuat
                        </div>
                    </div>
                    <p class="mt-2 text-success">Transaksi berhasil dibuat.</p>
                    <div class="progress mt-2">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 33%;" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100">
                            Pembayaran
                        </div>
                    </div>
                    <p class="mt-2 text-warning">Silahkan melakukan pembayaran.</p>
                    <div class="progress mt-2">
                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 33%;" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100">
                            Selesai
                        </div>
                    </div>
                    <p class="mt-2 text-secondary">Transaksi selesai.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

