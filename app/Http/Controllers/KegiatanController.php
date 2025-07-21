<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;
use Illuminate\Support\Facades\Storage;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatans = Kegiatan::all();
        return view('admin.kegiatan.index', compact('kegiatans'));
    }

    public function create()
    {
        return view('admin.kegiatan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif',
            'judul' => 'nullable|string|max:255',
            'keterangan' => 'nullable|string'
        ]);

        $fotoPath = null;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fotoPath = $file->store('kegiatan', 'public'); 
        }

        Kegiatan::create([
            'gambar' => $fotoPath,
            'judul' => $request->judul,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('admin.kegiatan.index')->with('success', 'Data berhasil ditambah');
    }

    public function edit(Kegiatan $kegiatan)
    {
        return view('admin.kegiatan.edit', compact('kegiatan'));
    }

    public function update(Request $request, Kegiatan $kegiatan)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif',
            'judul' => 'nullable|string|max:255',
            'keterangan' => 'nullable|string'
        ]);

        $imagePath = $kegiatan->gambar;

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama dari storage jika ada
            if ($kegiatan->gambar) {
                Storage::disk('public')->delete($kegiatan->gambar);
            }
            // Simpan gambar baru
            $imagePath = $request->file('gambar')->store('kegiatan', 'public');
        }

        $dataToUpdate = $validatedData;

        $dataToUpdate['gambar'] = $imagePath;

        $kegiatan->update($dataToUpdate);

        return redirect()->route('admin.kegiatan.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(Kegiatan $kegiatan)
    {
        if ($kegiatan->gambar) { 
            Storage::disk('public')->delete($kegiatan->gambar);
        }

        $kegiatan->delete();

        return redirect()->route('admin.kegiatan.index')->with('success', 'Data berhasil dihapus!');
    }
}
