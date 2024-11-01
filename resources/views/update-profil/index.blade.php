@extends('layouts.main')


@section('container')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card shadow-sm p-4">
            <h3 class="fw-semibold mb-4" style="color: #5bb6e8;">Edit Profile</h3>
            <div class="text-center mb-4">
                <img src="{{ asset('images/profile/icon-profile.png') }}" alt="User Profile" class="rounded-circle profile-picture">
            </div>
            <form action="/update-profil/{{ Auth::user()->user_id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nama_depan" class="form-label">Nama Depan</label>
                        <input type="text" class="form-control @error('nama_depan') is-invalid @enderror" id="nama_depan" name="nama_depan" value="{{ old('nama_depan', $user->nama_depan ?? '') }}" required placeholder="Masukkan Nama Depan">
                        @error('nama_depan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="nama_belakang" class="form-label">Nama Belakang</label>
                        <input type="text" class="form-control @error('nama_belakang') is-invalid @enderror" id="nama_belakang" name="nama_belakang" value="{{ old('nama_belakang', $user->nama_belakang ?? '') }}" required placeholder="Masukkan Nama Belakang">
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
                           required placeholder="Masukkan NIK" oninput="checkNIKLength()">
                    <small id="nikFeedback" class="form-text text-muted"></small>
                    @error('nik')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email ?? '') }}" required placeholder="Masukkan Email">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat', $user->alamat ?? '') }}" placeholder= "Masukkan Alamat">
                    @error('alamat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                </div>
                <div class="mb-3">
                    <label for="no_telp" class="form-label">No telp</label>
                    <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" name="no_telp" value="{{ old('no_telp', $user->no_telp ?? '') }}" placeholder="Masukkan No.Telp">
                    @error('no_telp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                </div>
                <div class="mb-3">
                    <label for="ktp" class="form-label">Upload KTP <span class="text-danger">*</span></label>
                    <div class="upload-box">
                        <input type="file" class="form-control-file" id="ktp" name="ktp" onchange="showFileName(this); previewImage(event);">
                        <div id="upload-text" class="upload-box-content text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-cloud-arrow-up upload-svg-icon" viewBox="0 0 16 16">
                            </svg>
                            <p class="upload-text">Pilih foto atau tarik kesini</p>
                            <p class="upload-hint">JPEG atau PNG maksimal ukuran 10 MB.</p>
                            <button type="button" class="btn btn-outline-secondary" onclick="document.getElementById('ktp').click()">Pilih Foto</button>
                            <p id="file-name" class="text-muted mt-2">
                                @if($user->ktp)
                                    {{ basename($user->ktp) }}
                                @else
                                    Tidak ada file yang di-upload
                                @endif
                            </p>
                        </div>
                        <img id="ktp-preview" src="{{ asset('images/ktp/' . $user->ktp) }}" alt="Preview Gambar" style="display: none; max-width: 200px; margin-top: 10px;">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="provinsi" class="form-label">Provinsi</label>
                        <select class="form-control" id="provinsi" name="provinsi">
                            <option>Pilih Provinsi</option>
                            @foreach ($provinces as $provinsi)
                                <option value="{{ $provinsi->id }}" {{ $user->provinsi == $provinsi->id ? 'selected' : '' }}>
                                    {{ $provinsi->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="kabupaten" class="form-label">Kota / Kabupaten</label>
                        <select class="form-control" id="kabupaten" name="kabupaten">
                            <option>Pilih Kota / Kabupaten</option>
                            @foreach ($kabupatens as $kabupaten)
                                <option value="{{ $kabupaten->id }}" {{ $user->kota == $kabupaten->id ? 'selected' : '' }}>
                                    {{ $kabupaten->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="kecamatan" class="form-label">Kecamatan</label>
                        <select class="form-control" id="kecamatan" name="kecamatan">
                            <option>Pilih Kecamatan</option>
                            @foreach ($kecamatans as $kecamatan)
                                <option value="{{ $kecamatan->id }}" {{ $user->kecamatan == $kecamatan->id ? 'selected' : '' }}>
                                    {{ $kecamatan->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="desa" class="form-label">Kelurahan</label>
                        <select class="form-control" id="desa" name="desa">
                            <option>Pilih Kelurahan</option>
                            @foreach ($desas as $desa)
                                <option value="{{ $desa->id }}" {{ $user->kelurahan == $desa->id ? 'selected' : '' }}>
                                    {{ $desa->name }}
                                </option>
                            @endforeach
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

<script>
    function showFileName(input) {
        const fileName = input.files[0]?.name || "Tidak ada file dipilih";
        document.getElementById('file-name').textContent = fileName;
    }

    function previewImage(event) {
        const [file] = event.target.files;
        if (file) {
            const preview = document.getElementById("ktp-preview");
            preview.src = URL.createObjectURL(file);
            preview.style.display = "block"; // Menampilkan gambar preview

            // Sembunyikan upload-text ketika gambar dipilih
            document.getElementById("upload-text").style.display = "none";
        }
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
