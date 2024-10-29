@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card shadow-sm p-4">
            @if (!empty($data))

            <!-- Judul Detail Kamar -->
            <h3 class="fw-semibold text-primary mb-4 text-center" style="color: #5bb6e8;">Detail Kamar</h3>

            <!-- Galeri Gambar Kamar -->
            <h5 class="fw-semibold text-primary mt-4 " style="color: #5bb6e8;">Galeri Kamar</h5>
            <div class="row mt-3 mb-5">
                <!-- Gambar Besar -->
                <div class="col-md-8">
                    <img src="{{ asset('images/products/kamar1.png') }}" alt="Gambar Kamar Utama" class="img-fluid rounded shadow-sm kamar-image-large">
                </div>

                <!-- Gambar Kecil Vertikal -->
                <div class="col-md-4 d-flex flex-column gap-2">
                    <img src="{{ asset('images/products/dapur.png') }}" alt="Gambar Kamar" class="img-fluid rounded shadow-sm kamar-image-small">
                    <img src="{{ asset('images/products/parkiran.png') }}" alt="Gambar Kamar" class="img-fluid rounded shadow-sm kamar-image-small">
                </div>
            </div>

            <!-- Detail Penghuni dan Tanggal -->
            <div class="d-flex justify-content-between align-items-start mb-4">
                <div>
                    <h5 class="fw-semibold">Nama Penghuni:</h5>
                    <p>{{ $data->getuser->nama_depan . ' ' .$data->getuser->nama_belakang ?? 'Tidak ada data' }}</p>
                    <h5 class="fw-semibold">Nama Kamar:</h5>
                    <p>{{ $data->getkamar->nama ?? 'Tidak ada data' }}</p>
                    <h5 class="fw-semibold">Total Tinggal:</h5>
                    <p>{{ $data->total_tinggal ?? 'Tidak ada data' }} Bulan</p>

                    <h5 class="fw-semibold mt-3">Tanggal Mulai:</h5>
                    <p>{{ date('d F Y', strtotime($data->tanggal_pemesanan ?? now())) }}</p>

                    <h5 class="fw-semibold mt-3">Tanggal Selesai:</h5>
                    <p>{{ date('d F Y', strtotime($data->dibooking_sampai ?? now())) }}</p>

                    <!-- Badge Status dan Tombol -->
                    <div class="mt-3 d-flex align-items-center gap-2">
                        @if ($data->dibooking_sampai && $data->dibooking_sampai > now())
                            <span class="badge bg-primary rounded-3 fw-semibold fs-5">Aktif</span>
                        @else
                            <span class="badge bg-danger rounded-3 fw-semibold fs-5">Tidak Aktif</span>
                        @endif

                        <!-- Tombol Perpanjangan dan Pemberhentian Kontrak -->
                        @if($data->status === 'aktif')
                        <button class="btn btn-outline-primary btn-sm" 
                                data-bs-toggle="modal" 
                                data-bs-target="#perpanjanganModal"  
                                data-harga="{{ $data->getkamar->harga }}" 
                                data-id="{{ $data->kamar }}" 
                                data-dibooking_sampai="{{ $data->dibooking_sampai }}">
                            Perpanjangan Kontrak
                        </button>
                        <button class="btn btn-outline-danger btn-sm" 
                                data-bs-toggle="modal" 
                                data-bs-target="#pemberhentianModal">
                            Pemberhentian Kontrak
                        </button>
                    @endif
                    
                    </div>
                </div>
            </div>

            <h4 class="fw-semibold text-primary mt-4" style="color: #5bb6e8;">Aturan Kost</h4>
            <ul class="list-unstyled mt-3">
                <li>1. Tidak diperkenankan membawa tamu tanpa izin.</li>
                <li>2. Dilarang merokok di dalam kamar dan area kos.</li>
                <li>3. Kebersihan kamar harus dijaga setiap saat.</li>
                <li>4. Tidak boleh memasak di dalam kamar.</li>
                <li>5. Jam malam berlaku pukul 22.00, harap tidak membuat kegaduhan setelahnya.</li>
                <li>6. Dilarang membawa barang berbahaya atau terlarang.</li>
                <li>7. Pembayaran sewa harus dilakukan tepat waktu setiap bulan.</li>
                <li>8. Setiap kerusakan fasilitas kos harus segera dilaporkan.</li>
            </ul>
        </div>
        @else
        <h1>TIDAK ADA DATA</h1>
        @endif

    </div>
</div>

<div class="modal fade" id="perpanjanganModal" tabindex="-1" aria-labelledby="perpanjanganModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="perpanjanganModalLabel">Perpanjangan Kontrak</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/pemesanan-kamar/create" method="POST">
                    @csrf
                    @if ($data)
                        
                    <input type="hidden" name="tanggal" value="{{ $data->dibooking_sampai }}">

                    <input type="hidden" name="user" value="{{ Auth::user()->user_id }}">
                            <input type="hidden" name="name" value="{{ Auth::user()->nama_depan }}">
                            <input type="hidden" name="kamar" value="{{ $data->kamar }}">
                            <input type="hidden" name="jenis" value="Sewa">
                            <input type="hidden" name="harga" value="{{ $data->getkamar->harga }}">
                    @endif

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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Perpanjang Kontrak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="pemberhentianModal" tabindex="-1" aria-labelledby="pemberhentianModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pemberhentianModalLabel">Pemberhentian Kontrak</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/pemberhentian-kontrak/{{ Auth::user()->user_id }}" method="POST">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="alasan" class="form-label">Apakah anda yakin untuk berhenti</label>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Pemberhentian Kontrak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
