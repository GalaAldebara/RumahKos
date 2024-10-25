<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function index()
    {
        return view('login.index2', [
            'title' => 'Register'
        ]);
    }

    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'nama' => 'required|max:255',
    //         'username' => ['required', 'min:3', 'max:255', 'unique:users'],
    //         'password' => 'required|min:5|max:255'
    //     ]);

    //     $validatedData['password'] = Hash::make($validatedData['password']);
    //     $validatedData['level_id'] = 3;

    //     User::create($validatedData);

    //     return redirect('/login')->with('success', 'Registration successfull! Please login');
    // }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users,username',
            'password' => 'required|min:5|max:255'
        ], [
            'username.unique' => 'Username sudah gunakan',
            'nama.required' => 'Nama tidak boleh kosong',
            // Tambahkan pesan khusus lainnya di sini
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['level_id'] = 3;

        User::create($validatedData);

        return response()->json(['success' => true, 'message' => 'Pendaftaran berhasil, silakan login.']);
    }
}
