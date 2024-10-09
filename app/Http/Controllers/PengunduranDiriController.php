<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengunduranDiriController extends Controller
{
    public function index()
    {
        return view('pengunduran-diri.index');
    }

    public function create()
    {
        return view('pengunduran-diri.create');
    }

    public function store(Request $request) {}
}
