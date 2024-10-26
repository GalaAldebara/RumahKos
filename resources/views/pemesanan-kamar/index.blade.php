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


                            {{-- Dibooking sampai {{ \Carbon\Carbon::parse($d->dibooking_sampai)->format('d M Y') }} --}}

                            <button type="submit" class="btn btn-success" style="background-color:#6986fd" >Kirim Pesanan</button>


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
        <div class="modal-content" style="border: 2px solid #6484fc; background-color: #f0f0f0; border-radius: 15px;"> <!-- Border biru dan latar belakang abu-abu terang dengan radius -->
            <div class="modal-header">
                <h5 class="modal-title" id="confirmationModalLabel">Buat Pesanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-left text-center"> <!-- Teks menjadi rata tengah -->
                <div class="mb-3 text-center">
                    <img src="{{ asset('images/logos/ceklis.png') }}" alt="Ceklis" style="width: 80px; height: 80px;">
                </div>
                <p>Pastikan data akun Anda dan produk yang Anda pilih valid dan sesuai.</p>
                <div style="text-align: left;"> <!-- Rata kiri untuk detail -->
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


<script>
    function showConfirmationModal() {
        document.getElementById('confirmName').innerText = document.getElementById('name').value;
        document.getElementById('confirmAddress').innerText = document.getElementById('address').value;
        document.getElementById('confirmNIK').innerText = document.getElementById('nik').value;
        document.getElementById('confirmDuration').innerText = document.getElementById('duration').value;

        var bookingModal = new bootstrap.Modal(document.getElementById('bookingModal'));
        bookingModal.hide();

        var confirmationModal = new bootstrap.Modal(document.getElementById('confirmationModal'));
        confirmationModal.show();
    }
</script>

<script>
function validateForm() {
    const name = document.getElementById('name').value;
    const address = document.getElementById('address').value;
    const nik = document.getElementById('nik').value;
    const duration = document.getElementById('duration').value;

    let valid = true;

    // Validasi Nama
    if (name === "") {
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Isi nama terlebih dahulu',
            confirmButtonColor: '#6986fd',
        });
        valid = false;
    }

    // Validasi Alamat
    else if (address === "") {
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Isi alamat terlebih dahulu',
            confirmButtonColor: '#6986fd',
        });
        valid = false;
    }

    // Validasi NIK
    else if (nik === "") {
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Isi NIK terlebih dahulu',
            confirmButtonColor: '#6986fd',
        });
        valid = false;
    }

    // Validasi Durasi Tinggal
    else if (duration === "") {
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Isi durasi tinggal terlebih dahulu',
            confirmButtonColor: '#6986fd',
        });
        valid = false;
    }

    // Jika semua input valid, lanjutkan
    if (valid) {
        showConfirmationModal(); // Panggil fungsi untuk menampilkan modal konfirmasi
    }
}

</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



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
