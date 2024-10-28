{{-- resources/views/404.blade.php --}}

@extends('layouts.main')

@section('container')
<style>
    .error-page {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background-image: url('{{ asset('images/backgrounds/404background.png') }}');
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
        text-align: center;
    }
    .error-container {
        border: 3px solid white;
        border-radius: 10px;
        padding: 15px;
        background-color: rgba(255, 255, 255, 0.9);
        color: black;
    }
    .error-title {
        font-size: 36px;
        font-weight: bold;
    }
    .error-message {
        font-size: 18px;
        margin-top: 5px;
    }
</style>

<div class="error-page">
    <div class="error-container">
        <h1 class="error-title">Ups, Halaman Tidak Ditemukan!</h1>
        <p class="error-message">Kamar Yang Anda Cari Tidak Ditemukan</p>
        <a href="{{ url('pemesanan-kamar') }}" class="btn btn-primary">Pesan Kamar!</a>
    </div>
</div>
@endsection
