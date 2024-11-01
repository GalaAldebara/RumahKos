@extends('layouts.main')

@section('container')
<div class="row">
    <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4 text-primary">Daftar Kamar Kos</h5>
                <a href="/kamar/create" class="btn btn-primary mb-4">Tambah</a>

                @if (session()->has('success'))
                    <div class="alert alert-success col-lg-8 mt-3" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">No</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Nama</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Deskripsi</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Luas</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Fasilitas Tambahan</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Kamar 1</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Kamar 2</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Kamar Mandi</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Harga</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Status</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Action</h6>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($data as $d)
                            <tr>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">{{ $loop->iteration }}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">{{ $d->nama }}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal">{{ $d->deskripsi }}</p>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal">{{ $d->luas }} m²</p>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal">{{ $d->fasilitas }}</p>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal">{{ $d->gambar_kamar_tidur_1 ? 'Ada' : 'Kosong' }}</p>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal">{{ $d->gambar_kamar_tidur_2 ? 'Ada' : 'Kosong' }}</p>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal">{{ $d->gambar_kamar_mandi ? 'Ada' : 'Kosong' }}</p>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal">Rp{{ number_format($d->harga, 0, ',', '.') }}</p>
                                </td>
                                <td class="border-bottom-0">
                                    <div class="d-flex align-items-center gap-2">
                                        @if ($d->dibooking_sampai && $d->dibooking_sampai > now())
                                            <span class="badge bg-danger rounded-3 fw-semibold">Dipesan</span>
                                        @else
                                            <span class="badge bg-primary rounded-3 fw-semibold">Tersedia</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="border-bottom-0">
                                    <a href="kamar/{{ $d->kamar_id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="kamar/{{$d->kamar_id }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
