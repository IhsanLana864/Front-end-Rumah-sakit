<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Layanan;

class LayananController extends Controller
{
    public function index()
    {
        $layanans = Layanan::all();
        return view('admin.layanan.index', compact('layanans'));
    }

    public function create()
    {
        return view('admin.layanan.create');
    }

    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'pelayanan' => 'required|string|max:255',
            'hari' => 'required|string|max:255',
            'jam_pendaftaran_awal' => 'nullable',
            'jam_pendaftaran_akhir' => 'nullable',
            'jam_praktek_awal' => 'nullable',
            'jam_praktek_akhir' => 'nullable'
        ]);

        // Buat instance Product baru dan isi dengan data dari request
        Layanan::create($request->all());

        // Redirect kembali dengan pesan sukses
        return redirect()->route('admin.layanan.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit(Layanan $layanan)
    {
        return view('admin.layanan.edit', compact('layanan'));
    }

    public function update(Request $request, Layanan $layanan)
    {
        // Validasi data input
        $request->validate([
            'pelayanan' => 'required|string|max:255',
            'hari' => 'required|string|max:255',
            'jam_pendaftaran_awal' => 'nullable',
            'jam_pendaftaran_akhir' => 'nullable',
            'jam_praktek_awal' => 'nullable',
            'jam_praktek_akhir' => 'nullable'
        ]);

        $layanan->update($request->all());

        return redirect()->route('admin.layanan.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(Layanan $layanan)
    {
        $layanan->delete();

        return redirect()->route('admin.layanan.index')->with('success', 'Data berhasil dihapus!');
    }
}
