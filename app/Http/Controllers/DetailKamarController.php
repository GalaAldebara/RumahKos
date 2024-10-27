<?php

namespace App\Http\Controllers;

use App\Models\PenghuniModel;
use App\Models\KamarModel;
use Illuminate\Http\Request;

class DetailKamarController extends Controller
{
    // public function index()
    // {
    //     return view('detail-kamar.index');
    // }

    public function index()
    {
        $data = PenghuniModel::all();
        return view('detail-kamar.index', ['data' => $data]);
    }

    public function show($id)
    {
        $kamar = KamarModel::findOrFail($id);

        return view('detail-kamar.show', compact('kamar'));
    }

    public function store(Request $request) {}
}
