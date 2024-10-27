@extends('layouts.main')

@section('head')
<link rel="stylesheet" href="{{ asset('css/update-profil.css') }}">
@endsection

@section('container')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card shadow-sm p-4">
            <h3 class="fw-semibold text-primary mb-4">Edit Profile</h3>
            <div class="text-center mb-4">
                <img src="{{ asset('images/profile/yusri.png') }}" alt="User Profile" class="rounded-circle profile-picture">
            </div>
            <form action="{{ route('update-profil.update') }}" method="POST">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="first_name" class="form-label">Nama Depan</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name', $user->first_name ?? '') }}" required>
                    </div>

                    <div class="col-md-6">
                        <label for="last_name" class="form-label">Nama Belakang</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name', $user->last_name ?? '') }}" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" class="form-control" id="nik" name="nik" value="{{ old('nik', $user->nik ?? '') }}" required placeholder="35730500010002">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email ?? '') }}" required placeholder=" anggayunanda@gmail.com">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $user->address ?? '') }}" placeholder= "Jl. Semanggi Barat">
                </div>
                <div class="mb-3">
                    <label for="contact_number" class="form-label">No telp</label>
                    <input type="text" class="form-control" id="contact_number" name="contact_number" value="{{ old('contact_number', $user->contact_number ?? '') }}" placeholder="+62 85816178961">
                </div>
                <div class="mb-3">
                    <label for="ktp" class="form-label">Upload KTP <span class="text-danger">*</span></label>
                    <div class="upload-box">
                        <input type="file" class="form-control-file" id="ktp" name="ktp" accept="image/*" onchange="showFileName(this)">
                        <div class="upload-box-content text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-cloud-arrow-up upload-svg-icon" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708z"/>
                                <path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383m.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"/>
                            </svg>
                            <p class="upload-text">Pilih foto atau tarik kesini</p>
                            <p class="upload-hint">JPEG atau PNG maksimal ukuran 10 MB.</p>
                            <button type="button" class="btn btn-outline-secondary" onclick="document.getElementById('ktp').click()">Pilih Foto</button>
                            <p id="file-name" class="text-muted mt-2"></p>
                        </div>
                    </div>
                </div>


                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="city" class="form-label">Kota</label>
                        <input type="text" class="form-control" id="city" name="city" value="{{ old('city', $user->city ?? '') }}">
                    </div>
                    <div class="col-md-6">
                        <label for="province" class="form-label">Provinsi</label>
                        <input type="text" class="form-control" id="province" name="province" value="{{ old('province', $user->province ?? '') }}">
                    </div>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Ganti password jika anda ingin mengubah">
                </div>

                <!-- Action Buttons -->
                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function showFileName(input) {
        const fileName = input.files[0]?.name || "Tidak ada file dipilih";
        document.getElementById('file-name').textContent = fileName;
    }
</script>

@endsection
