@extends('layouts.main')

@section('container')
<div class="row">
    <div class="col-lg-12 d-flex align-items-stretch">
      <div class="card w-100">
        <div class="card-body p-4">
          <h5 class="card-title fw-semibold mb-4">Penghuni Kos</h5>
          <div class="table-responsive">
            <table class="table text-nowrap mb-0 align-middle">

              <thead class="text-dark fs-4">
                <tr>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">No</h6>
                  </th>
                  
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Kamar</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Name</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Tanggal Mulai</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Tanggal Selesai</h6>
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
                    <h6 class="fw-semibold mb-0">{{ $d->getkamar->nama }}</h6>
                  </td>
                  <td class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">{{ $d->getuser->username }}</h6>
                      <span class="fw-normal">{{ $d->getuser->nama }}</span>
                  </td>
                  
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">{{ date('d F Y', strtotime($d->tanggal_pemesanan)) }}</h6>
                  </td>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">{{ date('d F Y', strtotime($d->dibooking_sampai)) }}</h6>
                  </td>
                  <td class="border-bottom-0">
                    <div class="d-flex align-items-center gap-2">
                      @if ($d->dibooking_sampai && $d->dibooking_sampai > now())
                      <span class="badge bg-primary rounded-3 fw-semibold">Aktif</span>
                      @else
                      <span class="badge bg-danger rounded-3 fw-semibold">Tidak Aktif</span>
                      @endif
                    </div>
                  </td>

                  <td class="border-bottom-0">
                    {{-- <a href="penghuni/{{ $d->user_id }}/edit" class="btn btn-warning">Edit</a> --}}
                    <form action="" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">Keluarkan</button>
                    </form>
                  </td>
                  {{-- <td class="border-bottom-0">
                    <a href="penghuni/{{ $d->user_id }}/edit" class="btn btn-warning">Edit</a>
                    <form action="" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
                    </form>
                  </td> --}}
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
