@extends('layouts.main')

@section('container')
<div class="row">
    <div class="col-lg-12 d-flex align-items-stretch">
      <div class="card w-100">
        <div class="card-body p-4">
          <h5 class="card-title fw-semibold mb-3">Daftar Kamar Kos</h5>
          <a href="/kamar/create" class="btn btn-primary mb-4">Tambah</a>
          @if (session()->has('success'))
          <div class="alert alert-success col-lg-8 mt-3" role="alert">
              {{ session('success') }}
          </div>
      @endif
          <div class="table-responsive">
            <table class="table text-nowrap mb-0 align-middle">

              <thead class="text-dark fs-4">
                <tr>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Id</h6>
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
                    <h6 class="fw-semibold mb-0">Fasilitas</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Harga</h6>
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
                      {{-- <span class="fw-normal">Web Designer</span> --}}
                  </td>
                  <td class="border-bottom-0">
                    <p class="mb-0 fw-normal">{{ $d->deskripsi }}</p>
                  </td>
                  <td class="border-bottom-0">
                    <p class="mb-0 fw-normal">{{ $d->luas }}</p>
                  </td>
                  <td class="border-bottom-0">
                    <p class="mb-0 fw-normal">{{ $d->fasilitas }}</p>
                  </td>
                  <td class="border-bottom-0">
                    <p class="mb-0 fw-normal">{{ $d->harga }}</p>
                  </td>
                  <td class="border-bottom-0">
                    <a href="kamar/{{ $d->kamar_id }}/edit" class="btn btn-warning">Edit</a>
                    <form action="kamar/{{$d->kamar_id }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
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
