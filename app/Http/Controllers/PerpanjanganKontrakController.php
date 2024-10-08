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

    public function store(Request $request) {}
}
