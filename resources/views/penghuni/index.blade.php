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
                    <h6 class="fw-semibold mb-0">Id</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Assigned</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Name</h6>
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
                    <h6 class="fw-semibold mb-0">{{ $d->user_id }}</h6>
                  </td>
                  <td class="border-bottom-0">
                      <h6 class="fw-semibold mb-1">{{ $d->username }}</h6>
                      <span class="fw-normal">Web Designer</span>
                  </td>
                  <td class="border-bottom-0">
                    <p class="mb-0 fw-normal">{{ $d->nama }}</p>
                  </td>
                  <td class="border-bottom-0">
                    <a href="{{ route('penghuni.edit', $d->user_id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('penghuni.destroy', $d->user_id) }}" method="POST" style="display: inline;">
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
