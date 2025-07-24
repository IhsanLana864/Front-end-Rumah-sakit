<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facilitie;
use Illuminate\Support\Facades\Storage;

class FacilitieController extends Controller
{
    public function index()
    {
        $facilities = Facilitie::all();
        return view('admin.facilitie.index', compact('facilities'));
    }

    public function create()
    {
        return view('admin.facilitie.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif',
            'judul' => 'nullable|string|max:100',
            'keterangan' => 'nullable|string|max:100'
        ]);

        $fotoPath = null;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fotoPath = $file->store('facilitie', 'public'); 
        }

        Facilitie::create([
            'gambar' => $fotoPath,
            'judul' => $request->judul,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('admin.facilitie.index')->with('success', 'Data berhasil ditambah');
    }

    public function edit(Facilitie $facilitie)
    {
        return view('admin.facilitie.edit', compact('facilitie'));
    }

    public function update(Request $request, Facilitie $facilitie)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif',
            'judul' => 'nullable|string|max:100',
            'keterangan' => 'nullable|string|max:100'
        ]);

        $imagePath = $facilitie->gambar;

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama dari storage jika ada
            if ($facilitie->gambar) {
                Storage::disk('public')->delete($facilitie->gambar);
            }
            // Simpan gambar baru
            $imagePath = $request->file('gambar')->store('facilitie', 'public');
        }

        $dataToUpdate = $validatedData;

        $dataToUpdate['gambar'] = $imagePath;

        $facilitie->update($dataToUpdate);

        return redirect()->route('admin.facilitie.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(Facilitie $facilitie)
    {
        if ($facilitie->gambar) { 
            Storage::disk('public')->delete($facilitie->gambar);
        }

        $facilitie->delete();

        return redirect()->route('admin.facilitie.index')->with('success', 'Data berhasil dihapus!');
    }
}
