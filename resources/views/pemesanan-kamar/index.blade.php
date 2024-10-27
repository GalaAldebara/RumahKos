@extends('layouts.main')

@section('container')
<div class="row">
    <div class="col-lg-12 mt-4">
        <h5 class="mb-4 fw-semibold">Daftar Kamar Kost</h5>
        <div class="row">
            @foreach ($data as $d)
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="{{ asset('images/products/kamar-kost.jpeg') }}" class="card-img-top" alt="Kamar Kost">
                    <div class="card-body">
                        <h5 class="card-title">{{ $d->nama }}</h5>
                        <p class="card-text"><strong>Fasilitas:</strong></p>
                        <ul class="list-unstyled mb-2">
                            <li><i class="bi bi-check-circle text-primary"></i> {{ $d->fasilitas }}</li>
                            <li><i class="bi bi-check-circle text-primary"></i> {{ $d->luas }}</li>
                            <li><i class="bi bi-check-circle text-primary"></i> Springbed</li>
                            <li><i class="bi bi-check-circle text-primary"></i> Lemari</li>
                            <li><i class="bi bi-check-circle text-primary"></i> Kursi</li>
                        </ul>

                        <p class="text-muted mb-2">Rp {{ number_format($d->harga, 0, ',', '.') }}</p>

                        <div class="d-flex gap-2 justify-content-between">
                            @if ($d->dibooking_sampai && $d->dibooking_sampai > now())
                                <button class="btn btn-danger btn-lm" disabled>Terpesan</button>
                            @else
                                <button class="btn btn-primary btn-lm" data-bs-toggle="modal" data-bs-target="#bookingModal" data-id="{{ $d->kamar_id }}" data-harga="{{ $d->harga }}">Pesan</button>
                                <a href="{{ route('detail-kamar', ['id' => $d->kamar_id]) }}" class="btn btn-secondary btn-lm">Detail</a> <!-- Link ke halaman detail kamar -->
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Modal untuk booking -->
<div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bookingModalLabel">Pesan Kamar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset('images/products/kamar-kost.jpeg') }}" class="img-fluid" alt="Kamar Kost">
                    </div>
                    <div class="col-md-6">
                        <form id="bookingForm" action="/pemesanan-kamar/create" method="POST">
                            @csrf
                            <input type="hidden" name="user" value="{{ Auth::user()->user_id }}">
                            <input type="hidden" name="kamar" value="">
                            <input type="hidden" name="harga" value="">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" placeholder="Masukkan nama" value="{{ Auth::user()->nama }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Alamat Tempat Tinggal</label>
                                <input type="text" class="form-control" id="address" placeholder="Masukkan alamat" required>
                                <span id="addressError" class="text-danger" style="display:none;">Isi data terlebih dahulu</span>
                            </div>
                            <div class="mb-3">
                                <label for="nik" class="form-label">Nomor Induk Keluarga</label>
                                <input type="text" class="form-control" id="nik" placeholder="Masukkan NIK" required>
                                <span id="nikError" class="text-danger" style="display:none;">Isi data terlebih dahulu</span>
                            </div>
                            <div class="mb-3">
                                <label for="duration" class="form-label">Berapa lama tinggal?</label>
                                <input type="number" class="form-control" id="duration" name="total_tinggal" placeholder="Misal: 1 bulan" required>
                            </div>

                            <button type="submit" class="btn btn-success" style="background-color:#6986fd">Kirim Pesanan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Pesanan -->
<div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content confirmation-modal">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmationModalLabel">Buat Pesanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <div class="mb-3 text-center">
                    <img src="{{ asset('images/logos/ceklis.png') }}" alt="Ceklis" style="width: 80px; height: 80px;">
                </div>
                <p>Pastikan data akun Anda dan produk yang Anda pilih valid dan sesuai.</p>
                <div style="text-align: left;">
                    <p><strong style="display: inline-block; width: 120px;">Nama:</strong> <span id="confirmName"></span></p>
                    <p><strong style="display: inline-block; width: 120px;">Alamat:</strong> <span id="confirmAddress"></span></p>
                    <p><strong style="display: inline-block; width: 120px;">NIK:</strong> <span id="confirmNIK"></span></p>
                    <p><strong style="display: inline-block; width: 120px;">Durasi Tinggal:</strong> <span id="confirmDuration"></span></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Pesan Sekarang!</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan!</button>
            </div>
        </div>
    </div>
</div>
@endsection
