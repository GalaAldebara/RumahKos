<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Hash;

class UpdateProfilController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('update-profil.index', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'nik' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
        ]);

        $pengumuman = User::find($id);
        $namaFile = $pengumuman->gambar;

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($namaFile && File::exists(public_path('images/profile/' . $namaFile))) {
                File::delete(public_path('gambar/pengumuman/' . $namaFile));
            }

            $extfile = $request->file('gambar')->getClientOriginalExtension();
            $judulFormatted = strtolower(str_replace(' ', '', $request->judul));
            $namaFile = $judulFormatted . '.' . $extfile;
            $request->file('gambar')->move(public_path('gambar/profile/'), $namaFile);
        }

        User::find($id)->update([
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'nik' => $request->nik,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'kota' => $request->kota,
            'provinsi' => $request->provinsi,
            'gambar' => $namaFile,
        ]);

        return redirect('/update-profil')->with('success', 'Data Kamar berhasil diubah');
    }
}
