<?php

namespace App\Http\Controllers;

use App\Models\PemesananModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PerpanjanganKontrakController extends Controller
{
    public function index()
    {
        $data = PemesananModel::where('user', Auth::id())
            ->where('dibooking_sampai', '>=', Carbon::now())
            ->get();
        return view('perpanjangan-kontrak.index', ['data' => $data]);
    }

    public function create()
    {
        return view('perpanjangan-kontrak.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'durasi' => 'required|integer|min:1'
        ]);

        return redirect()->back()->with('success', 'Kontrak berhasil diperpanjang');
    }

    public function storePemberhentian(Request $request)
    {
        $request->validate([
            'alasan' => 'required|string|max:255'
        ]);

        return redirect()->back()->with('success', 'Kontrak berhasil dihentikan');
    }
}
