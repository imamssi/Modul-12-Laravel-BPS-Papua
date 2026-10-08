<?php

namespace App\Http\Controllers;

use App\Models\Publikasi;

class PublikasiController extends Controller
{
    public function index()
    {
        $publikasi = Publikasi::all();
        return view('publikasi.index', compact('publikasi'));
    }
}
