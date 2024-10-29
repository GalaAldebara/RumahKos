<?php

namespace App\Http\Controllers;

use App\Models\OrderModel;
use Illuminate\Http\Request;

class HistoriController extends Controller
{
    public function index()
    {
        $data = OrderModel::where('status', 'Paid')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('pembayaran-kamar.histori', ['data' => $data]);
    }

    public function show(String $id)
    {
        $data = OrderModel::where('order_id', $id)->first();


        return view('pembayaran-kamar.show', [
            'data' => $data,
        ]);
    }
}
