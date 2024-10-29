<?php

namespace App\Http\Controllers;

use App\Models\PemesananModel;
use App\Models\PenghuniModel;
use App\Models\KamarModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DetailKamarController extends Controller
{
    public function index()
    {
        $data = PemesananModel::where('user', Auth::user()->user_id)
            ->where('status', 'aktif')
            ->first();

        return view('detail-kamar.index', ['data' => $data]);
    }


    public function show($id)
    {
        $kamar = KamarModel::findOrFail($id)->first();

        return view('detail-kamar.show', compact('kamar'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pemesanan' => 'required',
            'kamar' => 'required',
            'dibooking_sampai' => 'required',
            'total_tinggal' => 'required|integer|min:1',
        ]);

        // $validatedData['harga'] = $validatedData['total_tinggal'] * $validatedData['harga'];

        // PemesananModel::create($validatedData);

        $dibookingSampai = $validatedData['dibooking_sampai'];
        $pemesananId = $validatedData['pemesanan'];
        $kamarId = $validatedData['kamar'];
        $userId = Auth::user()->user_id;
        $totalTinggal = (int) $validatedData['total_tinggal'];
        $dibookingSampai = Carbon::parse($dibookingSampai);
        $dibookingSampai = $dibookingSampai->addMonths($totalTinggal);

        // Update tanggal dibooking_sampai di tabel kamar
        PemesananModel::where('pemesanan_id', $pemesananId)->update(['dibooking_sampai' => $dibookingSampai]);

        KamarModel::where('kamar_id', $kamarId)->update(['dibooking_sampai' => $dibookingSampai]);

        PenghuniModel::where('penghuni_id', $userId)->update(['dibooking_sampai' => $dibookingSampai]);

        return redirect('/detail-kamar')->with('success', 'Data Kamar Berhasil Ditambahkan');
    }
}
