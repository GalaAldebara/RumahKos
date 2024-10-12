@extends('layouts.main')

@section('container')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Edit Kamar Kos</h5>
                <form action="/kamar/{{ $data->kamar_id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nama" class="form-label">nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $data->nama)}}" required>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ old('deskripsi', $data->deskripsi)}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="luas" class="form-label">luas</label>
                        <input type="text" class="form-control" id="luas" name="luas" value="{{ old('luas', $data->luas)}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="fasilitas" class="form-label">fasilitas</label>
                        <input type="text" class="form-control" id="fasilitas" name="fasilitas" value="{{ old('fasilitas', $data->fasilitas)}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">harga</label>
                        <input type="number" class="form-control" id="harga" name="harga" value="{{ old('harga', $data->harga)}}" required>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        <a href="" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
