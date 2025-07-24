<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tentang_Kami;
use Illuminate\Support\Facades\Storage;

class TentangKamiController extends Controller
{
    public function index()
    {
        $tentang_kami = Tentang_Kami::first();
        return view('admin.tentang-kami.index', compact('tentang_kami'));
    }

    public function create()
    {
        return view('admin.tentang-kami.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'gambar1' => 'required|image|mimes:jpeg,png,jpg,gif',
            'gambar2' => 'required|image|mimes:jpeg,png,jpg,gif',
            'gambar3' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $gambarPaths = [];

        foreach (['gambar1', 'gambar2', 'gambar3'] as $gambarName) {
            if ($request->hasFile($gambarName)) {
                $file = $request->file($gambarName);
                $gambarPaths[$gambarName] = $file->store('tentang_kami', 'public');
            } else {
                // Jika gambar tidak di-upload (dan validasi memperbolehkan nullable), set null
                // Jika validasi required, bagian ini tidak akan tercapai tanpa file.
                $gambarPaths[$gambarName] = null;
            }
        }

        $dataToCreate = [
            'gambar1' => $gambarPaths['gambar1'],
            'gambar2' => $gambarPaths['gambar2'],
            'gambar3' => $gambarPaths['gambar3'],
        ];

        Tentang_Kami::create($dataToCreate);
        
        return redirect()->route('admin.tentang-kami.index')->with('success', 'Data berhasil ditambah');
    }

    public function edit(Tentang_Kami $tentang_kami)
    {
        return view('admin.tentang-kami.edit', compact('tentang_kami'));
    }

    public function update(Request $request, Tentang_Kami $tentang_kami)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'gambar1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gambar2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gambar3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $gambarPathsToSave = [];

        foreach (['gambar1', 'gambar2', 'gambar3'] as $gambarName) {
            // Cek apakah ada file baru di-upload untuk gambar ini
            if ($request->hasFile($gambarName)) {
                // Hapus gambar lama dari storage jika ada
                if ($tentang_kami->$gambarName) { // Akses properti gambar (misal $tentangKami->gambar1)
                    Storage::disk('public')->delete($tentang_kami->$gambarName);
                }
                // Simpan gambar baru
                $gambarPathsToSave[$gambarName] = $request->file($gambarName)->store('tentang_kami', 'public');
            } else {
                // Jika tidak ada file baru di-upload untuk gambar ini,
                // gunakan path gambar yang sudah ada sebelumnya
                $gambarPathsToSave[$gambarName] = $tentang_kami->$gambarName;
            }
        }

        $dataToUpdate = $validatedData;

        $dataToUpdate['gambar1'] = $gambarPathsToSave['gambar1'];
        $dataToUpdate['gambar2'] = $gambarPathsToSave['gambar2'];
        $dataToUpdate['gambar3'] = $gambarPathsToSave['gambar3'];

        $tentang_kami->update($dataToUpdate);

        return redirect()->route('admin.tentang-kami.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(Tentang_Kami $tentang_kami)
    {
        foreach (['gambar1', 'gambar2', 'gambar3'] as $gambarName) {
            if ($tentang_kami->$gambarName) { // Cek apakah ada path gambar di kolom ini
                Storage::disk('public')->delete($tentang_kami->$gambarName);
            }
        }

        $tentang_kami->delete();

        return redirect()->route('admin.tentang-kami.index')->with('success', 'Data berhasil dihapus!');
    }
}
