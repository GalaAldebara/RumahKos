@extends('layouts.main')

@section('container')
<h1>Perpanjangan Kontrak</h1>
<p>Halaman ini digunakan untuk perpanjangan kontrak kos.</p>

@foreach ($data as $d)
    
<p>{{ $d->getkamar->nama }}</p>
<p>{{ $d->getuser->nama }}</p>
<p>{{ $d->tanggal_pemesanan }}</p>
<p>{{ $d->dibooking_sampai }}</p>
<button class="btn btn-primary" type="submit">Perpanjang</button>
<button class="btn btn-danger" type="submit">Hentikan</button>

@endforeach

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
