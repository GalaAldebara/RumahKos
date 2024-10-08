@extends('layouts.main')

@section('container')
<div class="row">
    <div class="col-lg-12 mt-4">
        <h5 class="mb-4 fw-semibold">Daftar Kamar Kost</h5>
        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="{{ asset('images/products/kamar-kost.jpeg') }}" class="card-img-top" alt="Kamar Kost">
                    <div class="card-body">
                        <h5 class="card-title">Kost Singgahsini Tenggilis Mejoyo</h5>
                        <p class="card-text">Putra • WiFi • AC • Kloset Duduk • Kasur</p>
                        <p class="text-danger">Sisa 2 kamar</p>
                        <p class="text-muted">Rating: <span class="text-success">4.8</span></p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="{{ asset('images/products/kamar-kost.jpeg') }}" class="card-img-top" alt="Kamar Kost">
                    <div class="card-body">
                        <h5 class="card-title">Kost Singgahsini Krakatau</h5>
                        <p class="card-text">Campur • K. Mandi Dalam • AC • Kasur</p>
                        <p class="text-danger">Sisa 1 kamar</p>
                        <p class="text-muted">Rating: <span class="text-success">4.6</span></p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="{{ asset('images/products/kamar-kost.jpeg') }}" class="card-img-top" alt="Kamar Kost">
                    <div class="card-body">
                        <h5 class="card-title">Kost Singgahsini PIM Margonda Raya</h5>
                        <p class="card-text">Putri • K. Mandi Dalam • WiFi • AC</p>
                        <p class="text-danger">Sisa 3 kamar</p>
                        <p class="text-muted">Rating: <span class="text-success">4.5</span></p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="{{ asset('images/products/kamar-kost.jpeg') }}" class="card-img-top" alt="Kamar Kost">
                    <div class="card-body">
                        <h5 class="card-title">Kost Singgahsini Pak Ali Lowokwaru</h5>
                        <p class="card-text">Putri • WiFi • Kloset Duduk • Kasur • Akses 24 Jam</p>
                        <p class="text-danger">Sisa 1 kamar</p>
                        <p class="text-muted">Rating: <span class="text-success">4.8</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
