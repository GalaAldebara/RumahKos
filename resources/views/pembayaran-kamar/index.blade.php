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
                    <span>Muhammad Iqbal Makmur Al Muniri</span>
                </li>
                <li>
                    <strong>Nomor HP</strong>
                    <br>
                    <span>085816178961</span>
                </li>
                <li>
                    <strong>KTP</strong>
                    <br>
                    <span>357305007123923</span>
                </li>
                <li>
                    <strong>Tanggal Mulai</strong>
                    <br>
                    <span>2024-10-26</span>
                </li>
                <li>
                    <strong>Tanggal Selesai</strong>
                    <br>
                    <span>2025-01-26</span>
                </li>
            </ul>
        </div>

        <div class="col-md-4">
            <div class="card mb-3">
                <img src="{{ asset('images/products/kamar1.png') }}" class="card-img-top" alt="Kost Image">
                <div class="card-body  text-start">
                    <h6 class="fw-bold" style="font-size: 24px;">Kost Putra</h6> <!-- Increased font size -->
                    <p class="mb-1" style="font-size: 18px;">Kost (Matoangin Kamar No. 3)</p> <!-- Increased font size -->
                    <p class="text-muted small" style="font-size: 16px;">WiFi • Kasur • Air • K. Mandi Dalam</p> <!-- Optional: Adjust size if needed -->
                </div>
            </div>
            <div class="card p-3">
                <h6 class="fw-bold">Rincian Pembayaran</h6>
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
