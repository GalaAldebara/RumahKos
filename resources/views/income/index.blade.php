@extends('layouts.main')

@section('container')
<div class="row">
    <div class="col-lg-12 d-flex align-items-stretch">
      <div class="card w-100">
        <div class="card-body p-4">
          <h5 class="card-title fw-semibold mb-4">Total Pemasukan</h5>
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
                    <h6 class="fw-semibold mb-0">Total Tinggal</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Tanggal Mulai</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Tanggal Selesai</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Total Harga</h6>
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $d)
                    
                <tr>
                  <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $loop->iteration }}</h6></td>
                  <td class="border-bottom-0">
                      <h6 class="fw-semibold mb-1">{{ $d->getuser->username  }}</h6>
                      <span class="fw-normal">{{ $d->getuser->nama }}</span>                          
                  </td>
                  <td class="border-bottom-0">
                    <p class="mb-0 fw-normal">{{ $d->getkamar->nama }}</p>
                  </td>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-0 fs-4">{{ $d->total_tinggal }} Bulan</h6>
                  </td>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">{{ date('d F Y', strtotime($d->tanggal_pemesanan)) }}</h6>
                  </td>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">{{ date('d F Y', strtotime($d->dibooking_sampai)) }}</h6>
                  </td>
                  <td class="border-bottom-0">
                    <div class="d-flex align-items-center gap-2">
                      <span class="badge bg-primary rounded-3 fw-semibold"> Rp {{ number_format($d->harga, 0, ',', '.') }}</span>
                    </div>
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