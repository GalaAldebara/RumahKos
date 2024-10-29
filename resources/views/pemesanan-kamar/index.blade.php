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
                                @if ($hasActiveStatus)
                                    
                                <button id="bookingButton" class="btn btn-primary btn-lm" data-bs-toggle="modal" data-bs-target="#bookingModal" data-id="{{ $d->kamar_id }}" data-harga="{{ $d->harga }}" disabled>Pesan</button>
                                @else
                                <button id="bookingButton" class="btn btn-primary btn-lm" data-bs-toggle="modal" data-bs-target="#bookingModal" data-id="{{ $d->kamar_id }}" data-harga="{{ $d->harga }}">Pesan</button>
                                @endif

                                <a href="/detail-kamar/{{ $d->kamar_id }}" class="btn btn-secondary btn-lm">Detail</a> 
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
                            <input type="hidden" name="jenis" value="Perpanjang">
                            <input type="hidden" name="name" value="{{ Auth::user()->nama_depan }}">
                            <input type="hidden" name="kamar" value="{{ $d->kamar_id }}">
                            <input type="hidden" name="harga" value="{{ $d->harga }}">
                          
                          
                            <div class="mb-3">
                                <label for="tanggal" class="form-label mt-3">Pilih Tanggal</label>
                                <input type="date" id="tanggal" class="form-control" name="tanggal" min="<?php echo date('Y-m-d'); ?>"   max="<?php echo date('Y-m-d', strtotime('+1 week')); ?>">
                            </div>
                            <div class="mb-3">
                                <label for="duration" class="form-label">Durasi Sewa</label>
                                <select id="durasi" name="total_tinggal" class="form-select">
                                    <option value="1">Per 1 Bulan</option>
                                    <option value="3">Per 3 Bulan</option>
                                    <option value="6">Per 6 Bulan</option>
                                    <option value="9">Per 9 Bulan</option>
                                    <option value="12">Per Tahun</option>
                                </select>
                                
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

@push('scripts')
<script>
    document.getElementById('bookingButton').addEventListener('click', function(event) {
        // Mengambil user data
        const userKtp = '{{ Auth::user()->ktp }}';
        const userDataEmpty = !userKtp; // Cek jika nik kosong, tambahkan cek untuk data lain jika perlu

        // Jika nik kosong, arahkan ke /update-profil
        if (userDataEmpty) {
            event.preventDefault(); // Mencegah aksi default tombol
            window.location.href = '/update-profil'; // Arahkan ke halaman update profil
        }
    });
</script>
@endpush