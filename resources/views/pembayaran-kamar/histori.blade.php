@extends('layouts.main')

@section('container')
<div class="row">
    <div class="col-lg-12 d-flex align-items-stretch">
      <div class="card w-100">
        <div class="card-body p-4">
          <h5 class="card-title fw-semibold mb-3">Histori Pembayaran</h5>
         
          <div class="table-responsive">
            <table class="table text-nowrap mb-0 align-middle">

              <thead class="text-dark fs-4">
                <tr>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">No</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Nama</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Kamar</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Harga</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Jenis</h6>
                  </th>
                  {{-- <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Status</h6>
                  </th> --}}
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
                      <h6 class="fw-semibold mb-0">{{ $d->getuser->nama_depan }}</h6>
                  </td>
                  <td class="border-bottom-0">
                    <p class="mb-0 fw-normal">{{ $d->getkamar->nama }}</p>
                  </td>
                  <td class="border-bottom-0">
                    <p class="mb-0 fw-normal">Rp {{ number_format($d->harga, 0, ',', '.') }}</p>
                  </td>
                  <td class="border-bottom-0">
                    <p class="mb-0 fw-normal">{{ $d->jenis}}</p>
                  </td>
                  <td class="border-bottom-0">
                    <a href="/histori/{{ $d->order_id }}" class="btn btn-warning">Detail</a>
                    
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