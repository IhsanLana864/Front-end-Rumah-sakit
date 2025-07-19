<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::all();
        return view('admin.berita.index', compact('beritas'));
    }

    public function show(Berita $berita)
    {
        return view('admin.berita.show', compact('berita'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'judul' => 'required|string|max:255',
            'detail' => 'required|string',
            'kategori' => 'required|string|max:255',
        ]);

        $fotoPath = null;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fotoPath = $file->store('berita', 'public'); 
        }

        Berita::create([
            'gambar' => $fotoPath,
            'judul' => $request->judul,
            'detail' => $request->detail,
            'kategori' => $request->kategori,
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Data berhasil ditambah');
    }

    public function edit(Berita $berita)
    {
        return view('admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, Berita $berita)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'judul' => 'required|string|max:255',
            'detail' => 'required|string',
            'kategori' => 'required|string|max:255',
        ]);

        $imagePath = $berita->gambar;

        if ($request->hasFile('gambar')) {
            if ($berita->gambar) {
                Storage::disk('public')->delete($berita->gambar);
            }
            $imagePath = $request->file('gambar')->store('berita', 'public');
        }

        $dataToUpdate = $validatedData;

        $dataToUpdate['gambar'] = $imagePath;

        $berita->update($dataToUpdate);

        return redirect()->route('admin.berita.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(Berita $berita)
    {
        if ($berita->gambar) { 
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Data berhasil dihapus!');
    }
}
