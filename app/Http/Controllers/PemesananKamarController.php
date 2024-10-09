<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PemesananKamarController extends Controller
{
    public function index()
    {
        return view('pemesanan-kamar.index');
    }

    public function create()
    {
        return view('pemesanan-kamar.create');
    }

    public function store(Request $request) {}
}
