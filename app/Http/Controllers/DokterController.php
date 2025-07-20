<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;
use Illuminate\Support\Facades\Storage;

class DokterController extends Controller
{
    public function index()
    {
        $dokters = Dokter::all();
        return view('admin.dokter.index', compact('dokters'));
    }

    public function create()
    {
        return view('admin.dokter.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'spesifikasi' => 'required|string|max:255',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fotoPath = $file->store('dokter', 'public'); 
        }

        Dokter::create([
            'nama' => $request->nama,
            'spesifikasi' => $request->spesifikasi,
            'foto' => $fotoPath
        ]);

        return redirect()->route('admin.dokter.index')->with('success', 'Data Dokter berhasil ditambah');
    }

    public function edit(Dokter $dokter)
    {
        return view('admin.dokter.edit', compact('dokter'));
    }

    public function update(Request $request, Dokter $dokter)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'spesifikasi' => 'required|string|max:255',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $dokter->foto;

        if ($request->hasFile('foto')) {
            // Hapus gambar lama dari storage jika ada
            if ($dokter->foto) {
                Storage::disk('public')->delete($dokter->foto);
            }
            // Simpan gambar baru
            $imagePath = $request->file('foto')->store('dokter', 'public');
        }

        $dataToUpdate = $validatedData;

        $dataToUpdate['foto'] = $imagePath;

        $dokter->update($dataToUpdate);

        return redirect()->route('admin.dokter.index')->with('success', 'Data Dokter berhasil diperbarui!');
    }

    public function destroy(Dokter $dokter)
    {
        if ($dokter->foto) { 
            Storage::disk('public')->delete($dokter->foto);
        }

        $dokter->delete();

        return redirect()->route('admin.dokter.index')->with('success', 'Data Dokter berhasil dihapus!');
    }
}
