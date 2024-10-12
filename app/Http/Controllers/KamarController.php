<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KamarModel;


class KamarController extends Controller
{
    public function index()
    {
        $data = KamarModel::all();
        return view('info-kamar.index', ['data' => $data]);
    }

    public function create()
    {
        return view('info-kamar.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'luas' => 'required',
            'fasilitas' => 'required',
            'harga' => 'required',
        ]);

        KamarModel::create($validatedData);

        return redirect('/kamar')->with('success', 'Data Kamar Berhasil Ditambahkan');
    }

    public function edit(string $id)
    {
        $data = KamarModel::find($id);
        return view('info-kamar.edit', ['data' => $data]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'luas' => 'required',
            'fasilitas' => 'required',
            'harga' => 'required',
        ]);

        KamarModel::find($id)->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'luas' => $request->luas,
            'fasilitas' => $request->fasilitas,
            'harga' => $request->harga,
        ]);

        return redirect('/kamar')->with('success', 'Data Kamar berhasil diubah');
    }

    public function destroy(String $id)
    {
        $check = KamarModel::find($id);
        if (!$check) {
            return redirect('/kamar')->with('error', 'Data stok tidak ditemukan');
        }

        try {
            KamarModel::destroy($id);

            return redirect('/kamar')->with('success', 'Data kamar berhasil dihapus');
        } catch (\illuminate\Database\QueryException $e) {
            return redirect('/kamar')->with('error' . 'Data kamar gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}
