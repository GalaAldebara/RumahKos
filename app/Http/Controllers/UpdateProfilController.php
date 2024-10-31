<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Hash;

class UpdateProfilController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $provinces = Province::all();



        $kabupatens = Regency::all();
        $kecamatans = District::all();
        $desas = Village::all();

        return view('update-profil.index', compact('user', 'provinces', 'kabupatens', 'kecamatans', 'desas'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'nik' => 'required|digits:16',
            'email' => 'required|email',
            'alamat' => 'required',
            'no_telp' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'desa' => 'required',
        ]);

        // dd($request->all());

        User::find($id)->update([
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'nik' => $request->nik,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'provinsi' => $request->provinsi,
            'kota' => $request->kabupaten,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->desa,
        ]);

        // dd($request->all());


        $user = User::find($id);
        $namaFile = $user->ktp;


        if ($request->hasFile('ktp')) {
            $file = $request->file('ktp');
            $extfile = $file->getClientOriginalExtension();

            // Menangani nama file yang lebih aman
            $judulFormatted = strtolower(str_replace(' ', '', Auth::user()->username . Auth::user()->user_id));
            $namaFile = $judulFormatted . '.' . $extfile;

            $file->move(public_path('images/ktp'), $namaFile);
            $validatedData['ktp'] = $namaFile;
        }

        if ($request->filled('password')) {
            User::find($id)->update([
                'password' => Hash::make($request->password),
            ]);
        }


        User::find($id)->update([
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'nik' => $request->nik,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'provinsi' => $request->provinsi,
            'kota' => $request->kabupaten,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->desa,
            'ktp' => $namaFile,
        ]);

        return redirect('/update-profil')->with('success', 'Data Kamar berhasil diubah');
    }
}
