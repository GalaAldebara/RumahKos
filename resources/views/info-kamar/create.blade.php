@extends('layouts.main')

@section('container')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Tambah Kamar Kos</h5>
                <form action="/kamar/create" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama')}}" required>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ old('deskripsi')}}" required>
                    </div>

                    <div class="mb-3">
                        <label for="luas" class="form-label">Luas</label>
                        <input type="text" class="form-control" id="luas" name="luas" value="{{ old('luas')}}" required>
                    </div>

                    <div class="mb-3">
                        <label for="fasilitas" class="form-label">Fasilitas</label>
                        <input type="text" class="form-control" id="fasilitas" name="fasilitas" value="{{ old('fasilitas')}}" required>
                    </div>

                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" class="form-control" id="harga" name="harga" value="{{ old('harga')}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="image1" class="form-label">Gambar Kamar Tidur 1</label>
                        <input type="file" class="form-control" id="image1" name="image1" accept="image/*">
                    </div>

                    <div class="mb-3">
                        <label for="image2" class="form-label">Gambar Kamar Tidur 2</label>
                        <input type="file" class="form-control" id="image2" name="image2" accept="image/*">
                    </div>

                    <div class="mb-3">
                        <label for="image3" class="form-label">Gambar Kamar Mandi</label>
                        <input type="file" class="form-control" id="image3" name="image3" accept="image/*">
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Simpan Kamar</button>
                        <a href="" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
