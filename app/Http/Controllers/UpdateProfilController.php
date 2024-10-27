<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UpdateProfilController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('update-profil.index', compact('user'));
    }
}
