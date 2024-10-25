<?php

namespace App\Http\Controllers;

use App\Models\PenghuniModel;
use Illuminate\Http\Request;

class PenghuniController extends Controller
{
    public function index()
    {
        $data = PenghuniModel::all();
        return view('penghuni.index', ['data' => $data]);
    }
}
