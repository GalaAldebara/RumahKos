@extends('layouts.main')

@section('container')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <a href="halo, yus" class="text-decoration-none mb-3 d-block">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>

            <h5 class="fw-semibold">Informasi penyewa</h5>
            <ul class="list-unstyled">
                <li><strong style="width: 150px; display: inline-block;">Nama penyewa    </strong>: Muhammad Iqbal Makmur Al Muniri</li>
                <li><strong style="width: 150px; display: inline-block;">Nomor HP        </strong>: 085816178961</li>
                <li><strong style="width: 150px; display: inline-block;">KTP             </strong>: 357305007123923</li>
                <li><strong style="width: 150px; display: inline-block;">Tanggal Mulai   </strong>: 2024-10-26</li>
                <li><strong style="width: 150px; display: inline-block;">Tanggal Selesai </strong>: 2025-01-26</li>
            </ul>
        </div>

        <div class="col-md-4">
            <div class="card mb-3">
                <img src="{{ asset('images/products/kamar1.png') }}" class="card-img-top" alt="Kost Image">
                <div class="card-body">
                    <h6 class="fw-bold">Kost Putra</h6>
                    <p class="mb-1">Kost (Matoangin Kamar No. 3)</p>
                    <p class="text-muted small">WiFi • Kasur • Air • K. Mandi Dalam</p>
                </div>
            </div>
            <div class="card p-3">
                <h6 class="fw-bold">Rincian pembayaran</h6>
                <p class="text-muted small">Akan diarahkan ke halaman detail kamar setelah pembayaran</p>
                <div class="d-flex justify-content-between">
                    <p>Biaya sewa kos</p>
                    <p>Rp4.275.000</p>
                </div>

                <div class="d-flex justify-content-between">
                    <p>Deposit <i class="bi bi-question-circle" data-bs-toggle="tooltip" title="Info about deposit"></i></p>
                    <p>Rp300.000</p>
                </div>
                <hr>
                <div class="d-flex justify-content-between fw-bold">
                    <p>Total pembayaran</p>
                    <p>Rp4.590.000</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
