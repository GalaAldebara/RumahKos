<?php

namespace App\Http\Controllers;

use App\Models\PemesananModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PembayaranKamarController extends Controller
{
    public function index()
    {

        $order = PemesananModel::where('user', Auth::user()->user_id)->first();


        return view('pembayaran-kamar.show', compact('order'));
    }

    public function create()
    {
        return view('pembayaran-kamar.create');
    }

    public function store(Request $request) {}
}
