@extends('layouts.main')

@section('container')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <h5 class="fw-semibold" style="color: #5bb6e8;">Informasi Penyewa</h5>
            <ul class="list-unstyled">
                <li>
                    <strong>Nama penyewa</strong>
                    <br>
                    <span> {{ $data->getuser->nama_depan }}</span>
                </li>
                <li>
                    <strong>Nomor HP</strong>
                    <br>
                    <span> {{ $data->getuser->no_telp }}</span>
                </li>
                <li>
                    <strong>KTP</strong>
                    <br>
                    <span>{{ $data->getuser->nik }}</span>
                </li>
                <li>
                    <strong>Tanggal Mulai</strong>
                    <br>
                    <span>{{ date('d F Y', strtotime($data->tanggal_pemesanan)) }}</span>
                </li>
                <li>
                    <strong>Tanggal Selesai</strong>
                    <br>
                    <span>{{ date('d F Y', strtotime($data->dibooking_sampai)) }}</span>
                </li>
                <li>
                    <strong>Status</strong>
                    <br>
                    <span>{{ $data->status}}</span>
                </li>
            </ul>
        </div>

        <div class="col-md-4">
            <div class="card mb-3">
                <img src="{{ asset('images/products/kamar1.png') }}" class="card-img-top" alt="Kost Image">
                <div class="card-body">
                    <h6 class="fw-bold">Kost Putra</h6>
                    <p class="mb-1">{{ $data->getkamar->nama}}</p>
                    <p class="text-muted small">WiFi • Kasur • Air • K. Mandi Dalam</p>
                </div>
            </div>
            <div class="card p-3">
                <h6 class="fw-bold">Rincian Pembayaran</h6>
                <p class="text-muted small">Akan diarahkan ke halaman detail kamar setelah pembayaran</p>
                <div class="d-flex justify-content-between">
                    <p>Biaya sewa kos</p>
                    <p>Rp {{ number_format($data->getkamar->harga, 0, ',', '.') }}</p>
                </div>

                <div class="d-flex justify-content-between">
                    <p>Durasi Tinggal <i class="bi bi-question-circle" data-bs-toggle="tooltip" title="Info about deposit"></i></p>
                    <p>{{ $data->total_tinggal}} Bulan</p>
                </div>
                <div class="d-flex justify-content-between fw-bold">
                    <p>Total pembayaran</p>
                    <p>Rp {{ number_format($data->harga, 0, ',', '.') }}</p>
                </div>
                <hr>
                
            </div>

        </div>
    </div>
</div>
@endsection