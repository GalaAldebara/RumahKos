<?php

namespace App\Http\Controllers;

use App\Models\KamarModel;
use Illuminate\Http\Request;

class PemesananKamarController extends Controller
{
    public function index()
    {
        $data = KamarModel::all();
        return view('pemesanan-kamar.index', ['data' => $data]);
    }

    public function create()
    {
        return view('pemesanan-kamar.create');
    }

    public function store(Request $request) {}
}
