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
                        <p class="card-text">{{ $d->fasilitas}}</p>
                        <p class="card-text">{{ $d->luas}}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="text-muted mb-0"> Rp {{ number_format($d->harga, 0, ',', '.') }}

                                {{-- <span class="text-success">4.8</span> --}}
                            </p>
                            @if ($d->dibooking_sampai && $d->dibooking_sampai > now())
                            {{-- Dibooking sampai {{ \Carbon\Carbon::parse($d->dibooking_sampai)->format('d M Y') }} --}}
                            <button class="btn btn-danger btn-lm" data-bs-toggle="modal" data-bs-target="#bookingModal" data-id="{{ $d->kamar_id }}" data-harga="{{ $d->harga }}" disabled>Terpesan</button>
                            @else
                            <button class="btn btn-primary btn-lm" data-bs-toggle="modal" data-bs-target="#bookingModal" data-id="{{ $d->kamar_id }}" data-harga="{{ $d->harga }}">Pesan</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            
        </div>
    </div>
</div>

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
                            </div>
                            <div class="mb-3">
                                <label for="duration" class="form-label">Berapa lama tinggal?</label>
                                <input type="number" class="form-control" id="duration" name="total_tinggal" placeholder="Misal: 1 bulan" required>
                            </div>
                           
                           
                            {{-- Dibooking sampai {{ \Carbon\Carbon::parse($d->dibooking_sampai)->format('d M Y') }} --}}
                           
                            <button type="submit" class="btn btn-success" style="background-color:#6986fd" >Kirim Pesanan</button>
                            
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<script>
 document.addEventListener("DOMContentLoaded", function () {
    const bookingModal = document.getElementById("bookingModal");
    const bookingForm = document.getElementById("bookingForm");
    const kamarInput = bookingForm.querySelector('input[name="kamar"]');
    const hargaInput = bookingForm.querySelector('input[name="harga"]');

    bookingModal.addEventListener("show.bs.modal", function (event) {
        // Dapatkan tombol yang diklik untuk membuka modal
        const button = event.relatedTarget;
        // Ambil nilai kamar_id dan harga dari tombol
        const kamarId = button.getAttribute("data-id");
        const harga = button.getAttribute("data-harga");
        // Isi input hidden dengan kamar_id dan harga
        kamarInput.value = kamarId;
        hargaInput.value = harga;
    });
});

</script>
