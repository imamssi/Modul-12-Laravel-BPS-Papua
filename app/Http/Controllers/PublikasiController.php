<?php

namespace App\Http\Controllers;

use App\Models\Publikasi;
use Illuminate\Http\Request;

class PublikasiController extends Controller
{
    public function index()
    {
        $publikasi = Publikasi::all();
        return view('publikasi.index', compact('publikasi'));
    }

    public function create()
    {
        return view('publikasi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'judul' => 'required|string|max:255',
                'tanggal_rilis' => 'required|date',
                'sampul' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            ],
            [
                'judul.required' => 'Judul publikasi wajib diisi.',
                'tanggal_rilis.required' => 'Tanggal rilis wajib diisi.',
                'tanggal_rilis.date' => 'Tanggal rilis harus berupa tanggal yang valid.',
                'sampul.required' => 'Sampul publikasi wajib diunggah.',
                'sampul.image' => 'Sampul harus berupa file gambar.',
                'sampul.mimes' => 'Sampul harus berformat jpg, jpeg, png, atau webp.',
                'sampul.max' => 'Ukuran sampul maksimal 2 MB.',
            ]
        );

        $namaFile = time() . '_' . preg_replace('/[^A-Za-z0-9._-]/', '_', $request->file('sampul')->getClientOriginalName());
        $request->file('sampul')->move(public_path('images'), $namaFile);

        Publikasi::create([
            'judul' => $validated['judul'],
            'tanggal_rilis' => $validated['tanggal_rilis'],
            'sampul' => $namaFile,
        ]);

        return redirect()->route('publikasi.index')->with('success', 'Publikasi berhasil ditambahkan.');
    }
}
