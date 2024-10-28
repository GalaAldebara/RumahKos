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
            'tanggal' => 'required',
            'total_tinggal' => 'required|integer|min:1',
        ]);

        $validatedData['harga'] = $validatedData['total_tinggal'] * $validatedData['harga'];

        // PemesananModel::create($validatedData);

        $kamarId = $validatedData['kamar'];
        $totalTinggal = (int) $validatedData['total_tinggal'];
        $dibookingSampai = \Carbon\Carbon::parse($request->tanggal)->addMonths($totalTinggal);
        $tanggalPemesanan = \Carbon\Carbon::parse($request->tanggal);

        $order = PemesananModel::create([
            'user' => Auth::id(),
            'kamar' => $validatedData['kamar'],
            'harga' => $validatedData['harga'],
            'total_tinggal' => $totalTinggal,
            'dibooking_sampai' => $dibookingSampai,
            'tanggal_pemesanan' => $tanggalPemesanan, // Menyimpan tanggal pemesanan
            'status' => 'Unpaid'
        ]);

        PenghuniModel::create([
            'user' => Auth::user()->user_id,
            'kamar' => $validatedData['kamar'],
            'dibooking_sampai' => $dibookingSampai,
            'tanggal_pemesanan' => $tanggalPemesanan, // Menyimpan tanggal pemesanan
        ]);

        // Update tanggal dibooking_sampai di tabel kamar
        KamarModel::where('kamar_id', $kamarId)->update(['dibooking_sampai' => $dibookingSampai]);



        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = config('midtrans.is_production');
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
        \Midtrans\Config::$overrideNotifUrl = config('app.url') . '/api/midtrans-callback';

        $params = array(
            'transaction_details' => array(
                'order_id' => $order->pemesanan_id,
                'gross_amount' => $order->harga,
            ),
            'customer_details' => array(
                'name' => $request->name,
                // 'phone' => $request->phone,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        // dd($snapToken);
        return view('pembayaran-kamar.tes', compact('snapToken', 'order'));

        // return redirect('/pemesanan-kamar')
        //     ->with('success', 'Pemesanan kamar berhasil')
        //     ->with('snapToken', $snapToken)
        //     ->with('order', $order);
    }

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        if ($hashed == $request->signature_key) {
            if (($request->transaction_status == 'capture' && $request->payment_type == 'credit_card' && $request->fraud_status == 'accept') or $request->transaction_status == 'settlement') {
                $order = PemesananModel::find($request->order_id);
                $order->update(['status' => 'Paid']);
            }
        }
    }
}
