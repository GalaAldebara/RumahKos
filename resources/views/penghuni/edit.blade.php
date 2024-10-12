@extends('layouts.main')

@section('container')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Edit Penghuni Kos</h5>
                <form action="">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="" required>
                    </div>

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="" required>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        <a href="" class="btn btn-secondary">Batal</a>
                        <a href="" class="btn btn-secondary">Batal</a>
                    </div>

            </div>
        </div>
    </div>
</div>
@endsection
