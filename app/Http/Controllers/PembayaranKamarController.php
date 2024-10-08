<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PembayaranKamarController extends Controller
{
    public function index()
    {
        return view('pembayaran-kamar.index');
    }

    public function create()
    {
        return view('pembayaran-kamar.create');
    }

    public function store(Request $request) {}
}
