<?php

namespace App\Http\Controllers;

use App\Models\KamarModel;
use App\Models\OrderModel;
use App\Models\PemesananModel;
use App\Models\PenghuniModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemesananKamarController extends Controller
{
    public function index()
    {
        $dataPesan = PemesananModel::where('user', Auth::user()->user_id)->get();
        $hasActiveStatus = $dataPesan->contains('status', 'aktif');
        $data = KamarModel::all();
        return view('pemesanan-kamar.index', ['data' => $data, 'hasActiveStatus' => $hasActiveStatus]);
    }

    public function create()
    {
        return view('pemesanan-kamar.create');
    }

    public function store(Request $request)
    {
        // dd($request);

        $validatedData = $request->validate([
            'user' => 'required',
            'kamar' => 'required',
            'harga' => 'required',
            'tanggal' => 'required',
            'jenis' => 'required',
            'total_tinggal' => 'required|integer|min:1',
        ]);

        // dd($validatedData);

        $validatedData['harga'] = $validatedData['total_tinggal'] * $validatedData['harga'];

        // PemesananModel::create($validatedData);

        $kamarId = $validatedData['kamar'];
        $totalTinggal = (int) $validatedData['total_tinggal'];
        $dibookingSampai = \Carbon\Carbon::parse($request->tanggal)->addMonths($totalTinggal);
        $tanggalPemesanan = \Carbon\Carbon::parse($request->tanggal);

        $order = OrderModel::create([
            'user' => Auth::id(),
            'kamar' => $validatedData['kamar'],
            'harga' => $validatedData['harga'],
            'total_tinggal' => $totalTinggal,
            'dibooking_sampai' => $dibookingSampai,
            'tanggal_pemesanan' => $tanggalPemesanan,
            'status' => 'Unpaid',
            'jenis' => $validatedData['jenis'],
        ]);

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
                'order_id' => $order->order_id,
                'gross_amount' => $order->harga,
            ),
            'customer_details' => array(
                'name' => $request->name,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        // dd($snapToken);
        return view('pembayaran-kamar.index', compact('snapToken', 'order'));
    }

    public function update(Request $request, string $id)
    {


        PenghuniModel::where('user', $id)->update([
            'dibooking_sampai' => now(),
            'status' => 'tidak aktif'
        ]);

        $kamarIds = PemesananModel::where('user', $id)->pluck('kamar')->toArray();
        PemesananModel::where('user', $id)->update([
            'dibooking_sampai' => now(),
            'status' => 'tidak aktif'
        ]);
        KamarModel::where('kamar_id', $kamarIds)->update([
            'dibooking_sampai' => now(),
        ]);


        return redirect('/detail-kamar')->with('success', 'Data Kamar berhasil diubah');
    }

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        if ($hashed == $request->signature_key) {
            if (($request->transaction_status == 'capture' && $request->payment_type == 'credit_card' && $request->fraud_status == 'accept') or $request->transaction_status == 'settlement') {


                $order = OrderModel::find($request->order_id);
                $order->update(['status' => 'Paid']);

                PenghuniModel::updateOrCreate(
                    ['user' => $order->user], // Kondisi untuk mengecek apakah user sudah ada
                    [
                        'kamar' => $order->kamar,
                        'dibooking_sampai' => $order->dibooking_sampai,
                        'tanggal_pemesanan' => $order->tanggal_pemesanan,
                        'status' => 'aktif',
                    ]
                );

                // Update tanggal dibooking_sampai di tabel kamar
                KamarModel::where('kamar_id', $order->kamar)->update(['dibooking_sampai' => $order->dibooking_sampai]);

                PemesananModel::updateOrCreate(
                    [
                        'user' => $order->user,
                    ], // Kondisi untuk mengecek apakah user dan kamar sudah ada
                    [
                        'kamar' => $order->kamar,
                        'harga' => $order->harga,
                        'total_tinggal' => $order->total_tinggal,
                        'dibooking_sampai' => $order->dibooking_sampai,
                        'tanggal_pemesanan' => $order->tanggal_pemesanan,
                        'status' => 'aktif',
                    ]
                );
            }
        }
    }
}
