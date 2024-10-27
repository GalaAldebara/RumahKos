@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card shadow-sm p-4">

            <!-- Galeri Kamar -->
            <div class="row mt-3 mb-4">
                <!-- Gambar Besar -->
                <div class="col-md-8">
                    <img src="{{ asset('images/products/kamar1.png') }}" alt="Gambar Kamar Utama" class="img-fluid rounded shadow-sm kamar-image-large">
                </div>

                <!-- Gambar Kecil Vertikal -->
                <div class="col-md-4 d-flex flex-column gap-2">
                    <img src="{{ asset('images/products/dapur.png') }}" alt="Gambar Kamar" class="img-fluid rounded shadow-sm kamar-image-small">
                    <img src="{{ asset('images/products/parkiran.png') }}" alt="Gambar Kamar" class="img-fluid rounded shadow-sm kamar-image-small">
                    <button class="btn btn-outline-secondary mt-2">Lihat semua foto</button>
                </div>
            </div>

            <!-- Informasi Kamar -->
            <div class="row mb-4">
                <div class="col-md-8">
                    <h4 class="fw-semibold text-primary">Kost Bunga Widara No. 15 (Kamar 3)</h4>
                    <p>Kos Perempuan · Kecamatan Lowokwaru · <span class="text-success">4.9</span></p>

                    <!-- Fasilitas Kamar -->
                    <h5 class="fw-semibold text-primary mt-4">Fasilitas Kamar</h5>
                    <ul class="list-unstyled mt-3">
                        <li><i class="bi bi-check-circle text-primary"></i> Kasur & Lemari</li>
                        <li><i class="bi bi-check-circle text-primary"></i> Meja Belajar & Kursi</li>
                        <li><i class="bi bi-check-circle text-primary"></i> AC / Kipas Angin</li>
                        <li><i class="bi bi-check-circle text-primary"></i> Kamar Mandi Dalam</li>
                        <li><i class="bi bi-check-circle text-primary"></i> Wifi Gratis</li>
                        <li><i class="bi bi-check-circle text-primary"></i> Akses 24 Jam</li>
                    </ul>

                    <!-- Aturan Kost -->
                    <h5 class="fw-semibold text-primary mt-4">Aturan Kost</h5>
                    <ul class="list-unstyled mt-3">
                        <li>1. Tidak diperkenankan membawa tamu tanpa izin.</li>
                        <li>2. Dilarang merokok di dalam kamar dan area kos.</li>
                        <li>3. Kebersihan kamar harus dijaga setiap saat.</li>
                        <li>4. Tidak boleh memasak di dalam kamar.</li>
                        <li>5. Selalu kunci pagar.</li>
                        <li>6. Dilarang membawa barang berbahaya atau terlarang.</li>
                        <li>7. Pembayaran sewa harus dilakukan tepat waktu setiap bulan.</li>
                        <li>8. Setiap kerusakan fasilitas kos harus segera dilaporkan.</li>
                    </ul>
                </div>

                <!-- Sisi Pemesanan -->
                <div class="col-md-4">
                    <div class="border p-3 rounded">
                        <p class="text-danger">Diskon 184rb</p>
                        <h4 class="fw-bold text-primary">Rp 650.000 <span class="text-muted" style="font-size: 0.8rem;">(1 Bulan)</span></h4>

                        <label for="tanggal" class="form-label mt-3">Pilih Tanggal</label>
                        <input type="date" id="tanggal" class="form-control">

                        <label for="durasi" class="form-label mt-3">Durasi Sewa</label>
                        <select id="durasi" class="form-select">
                            <option value="1">Per Bulan</option>
                            <option value="2">Per Tahun</option>
                        </select>

                        <button class="btn btn-outline-primary w-100 mt-3">Ajukan Sewa</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
