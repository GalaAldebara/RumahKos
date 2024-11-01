<?php

namespace App\Http\Controllers;

use App\Models\OrderModel;
use App\Models\PemesananModel;
use Illuminate\Http\Request;

class PemasukanController extends Controller
{
    public function index()
    {
        $data = OrderModel::where('status', 'Paid')->get();
        return view('income.index', ['data' => $data]);
    }

    public function show(String $id)
    {
        $data = OrderModel::where('order_id', $id)->first();

        return view('pembayaran-kamar.show', [
            'data' => $data,
        ]);
    }
}
