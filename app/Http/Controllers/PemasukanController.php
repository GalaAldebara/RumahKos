<?php

namespace App\Http\Controllers;

use App\Models\PemesananModel;
use Illuminate\Http\Request;

class PemasukanController extends Controller
{
    public function index()
    {
        $data = PemesananModel::all();
        return view('income.index', ['data' => $data]);
    }
}
