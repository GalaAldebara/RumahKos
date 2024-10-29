@extends('layouts.main')


@section('container')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card shadow-sm p-4">
            <h3 class="fw-semibold mb-4" style="color: #5bb6e8;">Edit Profile</h3>
            <div class="text-center mb-4">
                <img src="{{ asset('images/profile/icon-profile.png') }}" alt="User Profile" class="rounded-circle profile-picture">
            </div>
            <form action="/update-profil/{{ $user->user_id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nama_depan" class="form-label">Nama Depan</label>
                        <input type="text" class="form-control @error('nama_depan') is-invalid @enderror" id="nama_depan" name="nama_depan" value="{{ old('nama_depan', $user->nama_depan ?? '') }}" required>
                        @error('nama_depan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="nama_belakang" class="form-label">Nama Belakang</label>
                        <input type="text" class="form-control @error('nama_belakang') is-invalid @enderror" id="nama_belakang" name="nama_belakang" value="{{ old('nama_belakang', $user->nama_belakang ?? '') }}" required>
                        @error('nama_belakang')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" class="form-control @error('nik') is-invalid @enderror" 
                           id="nik" name="nik" value="{{ old('nik', $user->nik ?? '') }}" 
                           required placeholder="35730500010002" oninput="checkNIKLength()">
                    <small id="nikFeedback" class="form-text text-muted"></small>
                    @error('nik')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email ?? '') }}" required placeholder=" anggayunanda@gmail.com">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat', $user->alamat ?? '') }}" placeholder= "Jl. Semanggi Barat">
                    @error('alamat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                </div>
                <div class="mb-3">
                    <label for="no_telp" class="form-label">No telp</label>
                    <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" name="no_telp" value="{{ old('no_telp', $user->no_telp ?? '') }}" placeholder="+62 85816178961">
                    @error('no_telp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                </div>
                <div class="mb-3">
                    <label for="ktp" class="form-label">Upload KTP <span class="text-danger">*</span></label>
                    <div class="upload-box">
                        <input type="file" class="form-control-file" id="ktp" name="ktp" onchange="showFileName(this)">
                        <div class="upload-box-content text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-cloud-arrow-up upload-svg-icon" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708z"/>
                                <path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383m.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"/>
                            </svg>
                            <p class="upload-text">Pilih foto atau tarik kesini</p>
                            <p class="upload-hint">JPEG atau PNG maksimal ukuran 10 MB.</p>
                            <button type="button" class="btn btn-outline-secondary" onclick="document.getElementById('ktp').click()">Pilih Foto</button>
                            <p id="file-name" class="text-muted mt-2">
                                @if($user->ktp)
                                    {{ basename($user->ktp) }} <!-- Tampilkan nama file KTP yang sudah di-upload sebelumnya -->
                                @else
                                    Tidak ada file yang di-upload
                                @endif
                            </p>
                        </div>
                    </div>
                </div>


                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="provinsi" class="form-label">provinsi</label>
                        <select class="form-control" id="provinsi" aria-label="Default select example" name="provinsi">
                        <option>Pilih provinsi</option>
                        @foreach ($provinces as $provinsi)
                            <option value="{{ $provinsi->id }}">{{ $provinsi->name }}</option>
                        @endforeach
                  </select>
                    </div>
                    <div class="col-md-6">
                        <label for="kabupaten" class="form-label">Kota / Kabupaten</label>
                        <select class="form-control" id="kabupaten" aria-label="Default select example" name="kota">
                            <option >Pilih Kota / Kabupaten</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="kecamatan" class="form-label">Kecamatan</label>
                        <select class="form-control" id="kecamatan" aria-label="Default select example" name="kecamatan">
                            <option>Pilih Kecamatan</option>
                           
                          </select>
                  </select>
                    </div>
                    <div class="col-md-6">
                        <label for="desa" class="form-label">Kelurahan</label>
                        <select class="form-control" id="desa" aria-label="Default select example" name="kelurahan">
                            <option>Pilih Kelurahan</option>
                        
                        </select>
                    </div>
                </div>


                <!-- Action Buttons -->
                <div class="d-flex justify-content-between mt-4">
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

<script>
    function showFileName(input) {
        // Ambil nama file yang dipilih
        if (input.files && input.files[0]) {
            const fileName = input.files[0].name;
            document.getElementById('file-name').textContent = fileName; // Tampilkan nama file yang dipilih
        }
    }
    </script>

<script>
    function checkNIKLength() {
        const nikInput = document.getElementById('nik');
        const nikFeedback = document.getElementById('nikFeedback');
        const nikLength = nikInput.value.length;

        // Reset feedback message
        nikFeedback.textContent = '';
        nikFeedback.classList.remove('text-success', 'text-danger');

        // Validasi angka
        if (!/^\d*$/.test(nikInput.value)) {
            nikFeedback.textContent = "NIK harus hanya terdiri dari angka.";
            nikFeedback.classList.add('text-danger');
            return;
        }

        if (nikLength === 16) {
            nikFeedback.textContent = "NIK sudah sesuai.";
            nikFeedback.classList.add('text-success');
        } else if (nikLength < 16) {
            nikFeedback.textContent = `NIK kurang ${16 - nikLength} karakter.`;
            nikFeedback.classList.add('text-danger');
        } else {
            nikFeedback.textContent = `NIK kelebihan ${nikLength - 16} karakter.`;
            nikFeedback.classList.add('text-danger');
        }
    }

 
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(function(){
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });

    $(function(){
        $('#provinsi').on('change', function(){
            let id_provinsi = $('#provinsi').val();

            // console.log(id_provinsi)
            $.ajax({
                type: 'POST',
                url: "{{ route('getkabupaten') }}",
                data: {id_provinsi: id_provinsi},
                cache: false,

                success: function(msg){
                    $('#kabupaten').html(msg);
                    $('#kecamatan').html('');
                    $('#desa').html('');
                },

                error: function(data){
                    console.log('error:',data);
                },
            })
        }),
        $('#kabupaten').on('change', function(){
            let id_kabupaten = $('#kabupaten').val();

            $.ajax({
                type: 'POST',
                url: "{{ route('getkecamatan') }}",
                data: {id_kabupaten: id_kabupaten},
                cache: false,

                success: function(msg){
                    $('#kecamatan').html(msg);
                    $('#desa').html('');
                },

             

                error: function(data){
                    console.log('error:',data);
                },
            })
        }),
        $('#kecamatan').on('change', function(){
            let id_kecamatan = $('#kecamatan').val();

            $.ajax({
                type: 'POST',
                url: "{{ route('getdesa') }}",
                data: {id_kecamatan: id_kecamatan},
                cache: false,

                success: function(msg){
                    $('#desa').html(msg);
                },

                error: function(data){
                    console.log('error:',data);
                },
            })
        })
    })
});

</script>
