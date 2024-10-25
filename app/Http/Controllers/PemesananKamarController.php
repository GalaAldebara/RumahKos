<?php

namespace App\Http\Controllers;

use App\Models\KamarModel;
use App\Models\PemesananModel;
use App\Models\PenghuniModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'user' => 'required',
            'kamar' => 'required',
            'harga' => 'required',
            'total_tinggal' => 'required|integer|min:1',
        ]);

        $validatedData['harga'] = $validatedData['total_tinggal'] * $validatedData['harga'];

        // PemesananModel::create($validatedData);

        $kamarId = $validatedData['kamar'];
        $totalTinggal = (int) $validatedData['total_tinggal'];
        $dibookingSampai = now()->addMonths($totalTinggal);
        $tanggalPemesanan = now();

        PemesananModel::create([
            'user' => Auth::id(),
            'kamar' => $validatedData['kamar'],
            'harga' => $validatedData['harga'],
            'total_tinggal' => $totalTinggal,
            'dibooking_sampai' => $dibookingSampai,
            'tanggal_pemesanan' => $tanggalPemesanan, // Menyimpan tanggal pemesanan
        ]);

        PenghuniModel::create([
            'user' => Auth::user()->user_id,
            'kamar' => $validatedData['kamar'],
            'dibooking_sampai' => $dibookingSampai,
            'tanggal_pemesanan' => $tanggalPemesanan, // Menyimpan tanggal pemesanan
        ]);

        // Update tanggal dibooking_sampai di tabel kamar
        KamarModel::where('kamar_id', $kamarId)->update(['dibooking_sampai' => $dibookingSampai]);

        return redirect('/pemesanan-kamar')->with('success', 'Data Kamar Berhasil Ditambahkan');
    }
}
