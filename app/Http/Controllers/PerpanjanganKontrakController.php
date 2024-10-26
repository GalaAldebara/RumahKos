<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerpanjanganKontrakController extends Controller
{
    public function index()
    {
        return view('perpanjangan-kontrak.index');
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
