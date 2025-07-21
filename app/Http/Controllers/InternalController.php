<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Internal;
use Illuminate\Support\Facades\Storage;

class InternalController extends Controller
{
    public function index()
    {
        $internals = Internal::all();
        return view('admin.internal.index', compact('internals'));
    }

    public function create()
    {
        return view('admin.internal.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'image|mimes:jpeg,png,jpg,gif',
            'kepemilikan' => 'required|string|max:255',
            'kelas_rumah_sakit' => 'required|string|max:255',
            'luas_tanah' => 'required|string|max:255',
            'luas_bangunan' => 'required|string|max:255',
            'deskripsi_fasilitas' => 'required|string',
        ]);

        $fotoPath = null;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fotoPath = $file->store('internal', 'public'); 
        }

        Internal::create([
            'gambar' => $fotoPath,
            'kepemilikan' => $request->kepemilikan,
            'kelas_rumah_sakit' => $request->kelas_rumah_sakit,
            'luas_tanah' => $request->luas_tanah,
            'luas_bangunan' => $request->luas_bangunan,
            'deskripsi_fasilitas' => $request->deskripsi_fasilitas,
        ]);

        return redirect()->route('admin.internal.index')->with('success', 'Data berhasil ditambah');
    }

    public function edit(Internal $internal)
    {
        return view('admin.internal.edit', compact('internal'));
    }

    public function update(Request $request, Internal $internal)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'gambar' => 'image|mimes:jpeg,png,jpg,gif',
            'kepemilikan' => 'required|string|max:255',
            'kelas_rumah_sakit' => 'required|string|max:255',
            'luas_tanah' => 'required|string|max:255',
            'luas_bangunan' => 'required|string|max:255',
            'deskripsi_fasilitas' => 'required|string',
        ]);

        $imagePath = $internal->gambar;

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama dari storage jika ada
            if ($internal->gambar) {
                Storage::disk('public')->delete($internal->gambar);
            }
            // Simpan gambar baru
            $imagePath = $request->file('gambar')->store('internal', 'public');
        }

        $dataToUpdate = $validatedData;

        $dataToUpdate['gambar'] = $imagePath;

        $internal->update($dataToUpdate);

        return redirect()->route('admin.internal.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(Internal $internal)
    {
        if ($internal->gambar) { 
            Storage::disk('public')->delete($internal->gambar);
        }

        $internal->delete();

        return redirect()->route('admin.internal.index')->with('success', 'Data berhasil dihapus!');
    }
}
